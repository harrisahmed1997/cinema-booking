<?php

$connection = mysqli_connect("localhost", "root", "", "nueplex");
// print_r($_GET);
if (!isset($_GET['userid']) || !isset($_GET['cinemaId']) || !isset($_GET['movieId'])) { ?>
    <script>
        window.location.replace("/cinema1/cinema1/shows.php");
    </script>
    <?php } else {
    //GETTING USER INFO

    $userid = $_GET['userid'];

    $userinfo = "SELECT * from users where userId = {$userid}";

    $data = mysqli_query($connection, $userinfo);

    $userdata = mysqli_fetch_assoc($data);

    $movieid = $_GET['movieId'];

    $movieinfo = "SELECT * from movies where movieId = {$movieid}";

    $moviedata = mysqli_query($connection, $movieinfo);

    $moviedata = mysqli_fetch_assoc($moviedata);


    $showid = $_GET['showId'];

    $showinfo = "SELECT * FROM showtimes where showId = {$showid}";

    $showresult = mysqli_query($connection, $showinfo);

    $showdata = mysqli_fetch_assoc($showresult);

    $cinemaid = $_GET['cinemaId'];

    $cinemainfo = "SELECT * FROM cinemas where cinemaId = {$cinemaid}";

    $cinemaresult = mysqli_query($connection, $cinemainfo);

    $cinemadata = mysqli_fetch_assoc($cinemaresult);

    $reservedseats = "SELECT * FROM seatreserve where showId = {$showid}";

    $reservedseatsinfo = mysqli_query($connection, $reservedseats);

    if (mysqli_num_rows($reservedseatsinfo) > 0) {

        $reservedata = json_encode(mysqli_fetch_all($reservedseatsinfo, MYSQLI_NUM)); ?>
        
        <script>
            const reserved = <?php echo $reservedata; ?>
        </script>
<?php }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        td {
            cursor: pointer;
            text-align: center;
        }

        td.selected {
            background: green;
        }

        td.reserved{
            background: blue;
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1>Hi, <?php echo $userdata['userName']; ?></h1>
            <h4>You're viewing available seats for <?php echo $moviedata['movieName']; ?></h4>
            <p>For the show <?php echo $showdata['showDate'] . " " . $showdata['showtimings'] ?></p>

            <h1>SEATS</h1>

            <table class="w-100 table table-striped">
                <tr>
                    <td class="seat">A1</td>
                    <td class="seat">A2</td>
                    <td class="seat">A3</td>
                    <td class="seat">A4</td>
                    <td class="seat">A5</td>
                    <td class="seat">A6</td>
                    <td class="seat">A7</td>
                    <td class="seat">A8</td>
                    <td class="seat">A9</td>
                    <td class="seat">A10</td>
                </tr>
                <tr>
                    <td class="seat">B1</td>
                    <td class="seat">B2</td>
                    <td class="seat">B3</td>
                    <td class="seat">B4</td>
                    <td class="seat">B5</td>
                    <td class="seat">B6</td>
                    <td class="seat">B7</td>
                    <td class="seat">B8</td>
                    <td class="seat">B9</td>
                    <td class="seat">B10</td>
                </tr>

                <tr>
                    <td class="seat">C1</td>
                    <td class="seat">C2</td>
                    <td class="seat">C3</td>
                    <td class="seat">C4</td>
                    <td class="seat">C5</td>
                    <td class="seat">C6</td>
                    <td class="seat">C7</td>
                    <td class="seat">C8</td>
                    <td class="seat">C9</td>
                    <td class="seat">C10</td>
                </tr>
            </table>

            <button class="btn btn-primary">SELECT SEATS</button>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            $(".seat").click(function() {
                $(this).toggleClass('selected');
            })

            $('.btn').click(function() {
                $('.seat.selected').map(function(e) {
                    seatno = $(this).text()
                    $.ajax({
                        url: "reserveseats.php",
                        type: "POST",
                        data: {
                            seats: seatno,
                            userid: <?php echo $userid ?>,
                            showid: <?php echo $showid ?>,
                            price: <?php echo $cinemadata['price'] ?>
                        },
                        success: function(result) {
                            console.log(result)
                        }

                    })
                })
            })

            if (reserved.length > 0) {
                reservedseats = []
                reserved.forEach(function(i) {
                    reservedseats.push(i[1])
                })

                $('.seat').map(function() {
                    for (i = 0; i < reservedseats.length; i++) {
                        if ($(this).text() == reservedseats[i]) {
                            $(this).addClass("reserved")
                            $(this).off('click');
                        }
                    }
                })
            }



        })
    </script>
</body>

</html>
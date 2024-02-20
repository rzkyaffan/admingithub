<?php
require 'functions.php';
$students = query("SELECT * FROM murid ORDER BY id DESC");

if(isset($_POST["btnsearch"])){
    $students = search($_POST["keywords"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SMAN NGUNUT</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
            border: none;
            text-decoration: none;
            /* border: 1px solid red; */
        }

        td,
        th {
            padding: .5rem;
        }

        .container {
            display: flex;
        }

        main {
            width: 100%;
            padding: 2rem;
            background: #edeff8;
            display: flex;
            flex-direction: column;
        }

        table {
            padding: 2rem;
            width: 100%;
            text-align: center;
            background: #ffffff;
            border-radius: 1rem;
        }

        table tr th {
            color: #bcbac6;
        }

        table tr:nth-child(even) {
            background: #f5f7fb;
        }

        aside {
            height: 100vh;
            width: 23%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        aside img {
            object-fit: cover;
            width: 55%;
            align-self: center;
            margin: 1.5rem 0 1.5rem ;
        }
        footer{
            display: flex;
            flex-direction: column;
            align-items: center;
            position: absolute;
            margin-bottom: 1rem;
            bottom: 0;
        }
        .footer-btn {
            padding: .5rem 3rem;
            display: inline-block;
            background: #eae8fc;
            color: #746be9;
            font-weight: 700;
            border-radius: .5rem;
            cursor: pointer;
        }

        .menu {
            display: flex;
            padding: 1rem 2.2rem;
            font-size: .9rem;
            align-items: center;
            gap: .5rem;
            color: #1a1b74;
            transition: .2s ease;
            font-size: .7rem;
        }

        .menu:hover {
            background-color: #8279f6;
            color: #f4f4fd;
        }
        .active{
            background-color: #8279f6;
            color: #f4f4fd;
        }

        svg {
            width: 24px;
            height: 24px;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding-bottom: 1rem;
        }

        header img {
            border-radius: 50%;
            margin-left: 1rem;
        }

        .search {
            padding: 1.5rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search input {
            padding: .56rem;
            border-radius: .4rem;
            margin-right: .5rem;
        }

        .btn {
            padding: .5rem 1rem;
            background: #0070f2;
            color: #e6f0fd;
            cursor: pointer;
        }

        .danger {
            background: #c9190b;
            color: #e6f0fd;
        }

        .box{
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .box svg {
            background-color: #ffffff;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <section class="container">
        <aside>
            <img src="assets/dashboard logo.png" alt="">

            <a href="index.php" class="menu">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/<svg class=" w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" clip-rule="evenodd" />
                </svg>
                <h1>Dashboard</h1>
            </a>

            <a href="tambah.php" class="menu">
                <svg class="w-[26px] h-[26px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                </svg>
                <h1>Add New Data</h1>
            </a>

            <a href="" class="menu">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/<svg class=" w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" clip-rule="evenodd" />
                </svg>
                <h1>Oriview</h1>
            </a>

            <footer>
            <img src="assets/aside btm img.png" alt="">
            <button type="Submit"><a href="https://wa.me/+6285731393754" class="footer-btn">Contact Us</a></button>
            </footer>

        </aside>
        <main>
            <header>
                <h1>Data Siswa</h1>
                <div class="box">
                    <svg class="w-[29px] h-[29px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.1 12.6v-1.8A5.4 5.4 0 0 0 13 5.6V3a1 1 0 0 0-2 0v2.4a5.4 5.4 0 0 0-4 5.5v1.8c0 2.4-1.9 3-1.9 4.2 0 .6 0 1.2.5 1.2h13c.5 0 .5-.6.5-1.2 0-1.2-1.9-1.8-1.9-4.2ZM8.8 19a3.5 3.5 0 0 0 6.4 0H8.8Z" />
                    </svg>
                    <img src="assets/conan.jpg" alt="" width="31px" height="31px">
                    <h4>Admin</h4>
                </div>
            </header>
            <div class="search">
                <form action="" method="post">
                    <input type="text" size="35" placeholder="Masukkan Keyword" name="keywords" autocomplete="off">
                    <button type="submit" name="btnsearch"><a href="search.php" class="btn">Search</a></button>
                </form>
                <div id="date"></div>
            </div>



            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>NIS</th>
                    <th>Menu</th>
                </tr>
                <tr>
                    <?php $i = 1; ?>
                    <?php foreach ($students as $student) : ?>
                        <td><?= $i ?></td>
                        <td><?= $student["nama_siswa"]; ?></td>
                        <td><?= $student["kelas"]; ?></td>
                        <td><?= $student["NIS"]; ?></td>
                        <td>
                            <button type="submit"><a href="edit.php?id=<?= $student["id"];?>" class="btn">Edit</a></button>
                            <button type="submit" class="btn danger" onclick="return confirm(`apakah anda yakin? \ntindakan ini tidak dapat diurungkan`)"><a href="delete.php?id=<?=$student["id"] ?>"class="danger" >Delete</a></button>
                        </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            </table>
        </main>
    </section>


</body>
<script>
    function updateClock() {
        let now = new Date();
        let day = now.toLocaleString('en-US', {
            weekday: 'long'
        });
        let date = now.getDate();
        let month = now.toLocaleString('en-US', {
            month: 'long'
        });
        let year = now.getFullYear();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();

        let timeString = day + ', ' + date + ' ' + month + ' ' + year + ' - ' +
            hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

        document.getElementById('date').textContent = timeString;
    }
    updateClock();
    setInterval(updateClock, 1000);

    let menu = document.querySelector('.menu');
    menu.addEventListener('click', function () {
       menu.classList.toggle('active');
    });

    console.log(menu)



</script>

</html>
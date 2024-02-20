<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo
        "
    <script>
    alert('input successful');
    document.location.href = 'index.php'
    </script>
        ";
    } else {
        echo
        "
    <script>
    alert('input failed, try again in a few moments');
    </>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
            border: none;
            border: none;
            text-decoration: none;
            /* border: 1px solid red; */
            list-style-type: none;
        }


        .container {
            display: flex;
        }

        form {
            background: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            border: 1px solid grey;
            border-radius: .2rem;
            margin: auto;
            text-align: center;
            padding: 3rem 5rem;
            width: 34vw;
            cursor: pointer;
        }

        form li {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        form input {
            padding: .3rem;
            border-bottom: 1px solid black;
        }

        form input:focus {
            outline: none;
        }

        form button {
            padding: .5rem 1rem;
            background: #0070f2;
            color: #e6f0fd;
            cursor: pointer;
        }


        main {
            width: 100%;
            padding: 2rem;
            background: #edeff8;
            display: flex;
            flex-direction: column;
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
            margin: 1.5rem 0 1.5rem;
        }

        footer {
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
           
            <form action="" method="POST">
            <input type="hidden" name="id">
                <li>
                    <label for="nama">Siswa Baru :</label>
                    <input type="text" name="nama" id="nama" required>
                </li>

                <li>
                    <label for="kelas">Kelas:</label>
                    <input type="text" name="kelas" id="kelas" required>
                </li>

                <li>
                    <label for="NIS">NIS:</label>
                    <input type="text" name="NIS" id="NIS" required>
                </li>
                <button type="submit" name="submit">Create</button>
            </form>
        </main>
    </section>


</body>

</html>
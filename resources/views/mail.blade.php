<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Blacklist App</title>
    <style>
            body{
                margin: 0;
                padding: 0;
                background-color: #FBF9F9;
                box-sizing: border-box;
                font-family: rakka;
            }
            .main__content{
                margin: auto;
                margin: 1rem 1rem 0 1rem;
                box-sizing: border-box;
                border: 1px solid #F6F6F6;
                background: rgb(2, 0, 36);
                background: linear-gradient(
                    90deg,
                    rgba(2, 0, 36, 1) 0%,
                    rgba(0, 37, 255, 1) 0%,
                    rgba(58, 31, 176, 1) 100%
                );
                border-radius: 34px;
                box-shadow: 0 10px 4px rgba(0, 0, 0, 0.25);
                padding: 2rem;
            }
            .main__content table{
                width: 100%;
                color: white;
                text-align: left;
            }
            .main__content table th{
                width: 100px;
            }
            header{
                width: 100%;
                height: 50px;
                padding: 1rem 0 1rem 0;
                background: rgb(2, 0, 36);
                background: linear-gradient(
                    90deg,
                    rgba(2, 0, 36, 1) 0%,
                    rgba(0, 37, 255, 1) 0%,
                    rgba(58, 31, 176, 1) 100%
                );
                text-align: center;
                color: white;
                font-size: 25px;
                font-weight: bold;
            }
    </style>
</head>
<body>
    <header>
        Register Blacklist App
    </header>
    <div class="main__content">
        <table>
            <tr>
                <th>Full Name</th>
                <td>:</td>
                <td>{{ $nama }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>:</td>
                <td>{{ $notelp }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $alamat }}</td>
            </tr>
            
        </table>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Admin</title>
    <style>
        /* default  */
        html{
            padding: 0;
        }
        body{
            background: #a6d6d6;
        }
        header{
            background: yellow;
            position: fixed;
            top: 0;
            left:0;
            width: 100%;
            color: white;
            font-family: Arial;
        }
        span{
            cursor: pointer;
        }
        span:hover{
            color: blue;
        }

        a{
            text-decoration: none;
            color: white;
        }

        /****************** header  **************************** */
        /* top_page  */
        .top_page{
            background: #21094e;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 10px 10px;
            height: 60px;
        }
        .top_page p{
            margin: 0;
            margin-right: 20px;
        }

        #log_out{
            width: 15%;
            display: flex;
            justify-content: center;
        }
        

        .search-bar{
            width: 45%;
            height: 40px;
            box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.5);
            border-radius: 5px;
        }
        .search-bar input{
            width: 92%;
            height: 100%;
            float: left;
            border: none;
            padding: 5px 10px;
            font-size: 15px;
        }
        #icon-search{
            float: left;
            width: 8%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: blue;
            
        }
        /* nav-bar  */
        .nav-bar{
            background: #511281;
        }
        .nav-bar ul{
            margin: 0;
            padding: 0; 
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            list-style: none;
            height: 50px;
        }

        .nav-bar ul li{
            height: 100%;
            width: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .nav-bar ul li:hover, .nav-bar ul li:active{
            background: #a5e1ad;
        }

        footer{
            background: gray;
        }
        #main{
            margin-top: 110px;
            background: #a6d6d6;
            /* display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; */
        }
        table{
            width: 70%;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        table th, table td{
            height: 50px;
        }
        table th{
            background: #a5e1ad;
        }
    </style>
</head>
<body>
    <header>
        <div class="top_page">
            <div id="logo">
                <img width="80px" height="60px" src="/ProjectMusicWeb/public/img/avt1.png" alt="">
            </div>
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Nhập tên ca sĩ hoặc bài hát để tìm kiếm ... " onkeyup="search(this.value)">
                <div id="icon-search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div id="log_out">
                <p>Hi, Admin</p>
                <a href="">Log out</a>
            </div>
        </div>
        <div class="nav-bar">
            <ul>
                <li onclick="load('http://localhost:8080/ProjectMusicWeb/admin/home')">Home</li>
                <li onclick="load('http://localhost:8080/ProjectMusicWeb/admin/category')">Danh mục</li>
                <li onclick="load('http://localhost:8080/ProjectMusicWeb/admin/music')">Musics</li>
                <li onclick="load('http://localhost:8080/ProjectMusicWeb/admin/tag')">Tags</li>
                <li onclick="load('http://localhost:8080/ProjectMusicWeb/admin/user')">User</li>
            </ul>
        </div>
    </header>
    <div id="main">
        <?php require_once(ROOT . DS . 'application' . DS . 'views' . DS . 'admin' . DS . "$main.php");?>
    </div>
    <footer>

    </footer>
    <script>    
        const main = document.getElementById('main');
        function load(url){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    main.innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET",url, true);
            xmlhttp.send();
        }

        function sendData(url, data = []){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    alert("Thêm thành công !");
                }
            }
            var urlSend = url;
            for(var i=0; i<data.length; i++){
                urlSend += '/' + data[i];
            }
            xmlhttp.open("GET",urlSend, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function del(id, table, url){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    var res = this.responseText;
                    console.log(res);
                    if(res == '.1'){
                        load(url);
                    }else{
                        alert("Xóa thất bại !");
                    }
                }
            }
            xmlhttp.open("GET", 'http://localhost:8080/ProjectMusicWeb/admin/delete/'+id+'/'+table, true);
            xmlhttp.send();
        }
    </script>

    <script>
        function search(search){
            setTimeout(() => {
                if(search.length == 0){
                    return;
                }else{
                    var xmlhttp = new XMLHttpRequest();
                    var url = 'http://localhost:8080/ProjectMusicWeb/admin/search/'+search;
                    xmlhttp.onreadystatechange = function(){
                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            load(url);
                        }
                    }
                    xmlhttp.open("GET", url, true);
                    xmlhttp.send();
                }
            }, 1000);
        }
    </script>
</body>
</html>
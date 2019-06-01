<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body{
        margin: 0;
        padding: 0;
        font-family: arial;
        font-size: 18px;
        color: #333;
    }
    h1{
        text-align: center;
        margin: auto;
        display: block;
        
    }
    input[type=text]{
        border-radius: 10px;
        width: 30vw;
        /* height: 30px; */
        box-shadow: 2px 2px 10px #000;
        display: block;
        margin: 30px;
        padding:10px;
        font-size: 20px;
    }
    textarea{
        border-radius: 10px;
        box-shadow: 2px 2px 10px #000;
        display: block;
        padding:10px;
        font-size: 20px;
        width: 80%;
        /* width: 300px; */
    }
    div.kotak{
        margin: 30px;
        width: 350px;
        height: 150px;
        
        /* border: 1px solid #000; */
        float: left;
        
        box-shadow: 2px 2px 10px #000;
        background-color: #ccc;
        text-align: center
        
        
    }
    form{
        margin: 50px;
    }
    div.container{
        /* border: 1px solid #000; */
        /* display: flex; */
        /* justify-content: center; */
        padding: 20px;
        
    }
    div.clear{
        clear: left;
    }
    a{
        /* color: blue; */
        /* text-decoration: underline; */
        cursor: pointer;
        /* width: 100px; */
        background-color: #4ea4a0;
        padding: 20px;
        position: relative;
        top: 50px;
        border-radius: 10px;
        color: #fff;
        
    }
    nav{
        width: 100%;
        background-color: #ccc;
        display: block;
        margin-top: -20px;
        /* position: relative; */
    }
    nav ul{
        /* position: absolute; */
        right: 0px;
    }
    nav ul li{
        float: left;
        margin: 10px;    
        list-style: none;
        cursor: pointer;
        line-height:50px;
    }
    nav ul li:hover{
        color: white;
    }
    button{
        display: inline-block;
    }
    </style>
    
</head>
<body>
<nav>
    <ul>
        <li><h1>D-Hash</h1></li>
        <li>Home</li>
        <li>Article</li>
        <li>Profile</li>
        <li>About</li>
        <div class="clear"></div>
    </ul>
</nav>
<h1>Akuu tidak akan merefresh halaman ini!!</h1>

<center>
<form action="simpan.php" method="post">
    
    <input type="text" name="judul_artikel" id="judul_artikel" placeholder="Judul Artikel">
    
    <textarea name="isi_artikel" id="isi_artikel" cols="100" rows="11" placeholder="Isi Artikel"></textarea>
    
    <a class="insert">Selesai</a>
</form>
</center>

<div class="container">
    <div class="content">

        
        
    </div>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, eos? Vel exercitationem, molestias dignissimos esse velit laudantium aperiam rerum, aut reiciendis ea repellendus ad neque? Quam excepturi quod dolores earum?</p>
</div>    
    <script src="../jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function(){
        loadData();
        $('a.insert').on('click', function(e){
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: $('form').attr('action'),
                data: $('form').serialize(),
                success: function(){
                    loadData();
                    resetForm();
                }
            })
        })
                
        
    })
    var update = document.getElementsByClassName('update');
    
    function loadData(){
        $.get('data.php', function(data){
            $('.content').html(data);
            $('button.delete').on('click', function(){
                var id = $(this).attr('id');
                $.ajax({
                    type:'post',
                    url: 'delete.php',
                    data: {id:id},
                    success: function(){
                        loadData();
                    }
                })
            });
            $('button.update').on('click', function(){            
                var judul = $(this).attr('judul');
                var isi = $(this).attr('isi');
                var id = $(this).attr('id');
                
                $('input[type=text]').val(judul);
                $('textarea').val(isi);
                $('form').attr('action', 'update.php?id=' + id);
            })
        })
    }
    function resetForm(){
        $('input').val('');
        $('textarea').val('');
        $('form').attr('action', 'simpan.php');
    }
    </script>
</body>
</html>
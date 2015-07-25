<!DOCTYPE html>
<html lang="en">
    
    <head>
    <img src="../img/DAIICT_2D logo.png" style="position:absolute; top:0px;right:0px;"><br>
    <p><strong>PHD COMPREHENSIVE</strong></p>
    
    </head>
    
    <body>
        
        <div class="container">

            <div class="box">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>STUDENT ID</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>STUDENT NAME</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        
                        <label>FACULTY CONVENER ID</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        
                        <label>FACULTY CONVENER'S NAME</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>COMMITTEE MEMBER 1</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>COMMITTEE MEMBER 2</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>COMMITTEE MEMBER 3</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>COMMITTEE MEMBER 4</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        <label>GRADE</label><br>
                        <input class="form-control" type="text">
                        <br><br>
                        
                        <label>COMMENTS</label><br>
                        <textarea name="Text1" cols="80" rows="8"></textarea>
                        <br>
                        <br>
                        <button onclick="myFunction()">Print this Page</button>
                        <br>
                        <button onclick="func()">Go back</button>
                    </div>
                </div>
            </div>
        

    </div>
        <script>
            function myFunction(){
                window.print();
            }
            function func(){
                window.location.href="Cmpr_a.php";
            }
        </script>
    </body>
    
    
</html>


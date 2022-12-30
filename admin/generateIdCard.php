<?php
require("auth.php");
include("config/dbcon.php");
?>


<?php
if (!isset($_GET['sid'])) {
    // session_start();
    $_SESSION["query_danger"] = false;
    $_SESSION['status'] = "No data fount";
    header("LOCATION: index.php");
    die();
}
?>


<!-- //here the data  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
<!-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

</head>
<body>

<div class="wrapper" id="wrapper">
<style>
    @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    @font-face {
    font-family: akrim;
    src: url('../fonts/Akram Unicode Akram Unicode.ttf');
    }
</style>

<style>
    
    body{
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
    }
    .wrapper{
        /* height: 1080px;
        width: 800px; */
        display: flex;
        justify-content: center;
    }
 .container1{
    border-radius: 25px;
    background: #3c9c2f;
    height: 700px;
    width: 500px;
    text-align: center;
    padding: 2px;
    
 }
 .container2{
    display: grid;
    border-radius: 25px;
    background: #4CAF50;
    height: 300px;
    width: 300px;
    text-align: center;
    margin: 2px;
    
 }
 table,h3,span{
    color: #fff;
    display: flex;
    justify-content: center;
    /* text-align: center; */
 }
 h3{
    font-family: 'akrim';
    font-size: 40px;
    font-weight: 1;
 }
 table{
    font-family: 'jameelnoori';
 }
 p{
    font-family: 'jameelnoori';
    font-size: 20px;
    color: #fff;
 }
 h4{
    font-family: 'jameelnoori';
    font-size: 30px;
    color: #fff;
    margin: 2px;

 }

 th, td {
  text-align: left;
  padding: 4px;
}
.footer1{
    display: flex;
    justify-content: center;
    margin: 2px;
}
.trh{
    font-size: 40px;
    text-align: right;
}
.trd{
    font-size: 30px;
    text-align: right;
}
img{
    border: 2px #fff;
    border-style: double;
}
button {
    border-radius: 4px;
    background-color: #4CAF50; 
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
}
button:hover {
  background-color: #3c9c2f; /* Green */
  color: #4CAF50;
  border: #fff;
  border-style: 4;
}
    
<?php
$student_id = mysqli_real_escape_string($con, $_GET['sid']);
$arr = array("/","'",";","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['sid'])),$arr))){
    echo ("<h1> Wrong Id</h1>");
    echo ("<p>No data found</>");
    // echo "</div>";
}else{
$query = "SELECT * FROM students WHERE t_admission_no='$student_id' LIMIT 1";
$query_run = mysqli_query($con, $query);
if ($query_run->num_rows > 0) {
    // output data of each row
    while ($row = $query_run->fetch_assoc()) {

?>

</style>
    <div class="container1">
                <h3 style="margin-top: 5px;margin-bottom: 5px;">مدرسہ مصباح العلوم بٹہ گنڈ</h3>
                <img src="images/student_images/<?php echo $row["t_photo"]; ?>" width="100" height="100" style="margin-top: 5px;">
                <table>
                <tbody>
                    <tr>
                        <td class="trd">مدرسہ مصباح العلوم بٹہ گنڈ  :</td>
                        <td class="trh"> نام</td>

                    </tr>
                    <tr>
                        <td class="trd"><?php echo $row["t_admission_no"]; ?> :</td>
                        <td class="trh"> رول نمبر</td>

                    </tr>
                    <tr>
                        <td class="trd"><?php echo $row["t_phone_number"]; ?> :</td>
                        <td class="trh"> فون </td>

                    </tr>
                    <tr>
                        <td class="trd">گلام محمد  :</td>
                        <td class="trh"> باپ کا نام </td>

                    </tr>
                    <tr>
                        <td class="trd">بٹہ گنڈ  :</td>
                        <td class="trh"> پتہ</td>
                    </tr>
                    
                    </tbody>
                    
                </table>
                <span>-----------------------------------------------------</span> 
                <div class="footer1">
                    <h4>مدرسہ مصباح العلوم بٹہ گنڈ</h4> 
                </div>

    </div>
    

    <div class="container1" style="margin-left: 20px;">
                <h3 style="margin-top: 5px;margin-bottom: 5px;">مدرسہ مصباح العلوم بٹہ گنڈ</h3>
                <img src="images/student_images/noimg.jpg" width="100" height="100" style="margin-top: 5px;">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, quae error minima reiciendis magnam rerum, earum sapiente voluptas tempora, praesentium facere expedita quod. Placeat, soluta? Soluta excepturi ab velit amet!</p>
                <span>-----------------------------------------------------</span> 
                
                    <h4 style="font-size: 30px;">مدرسہ مصباح العلوم بٹہ گنڈ</h4> 
                

    </div>

    
</div>

<div class="container2">
<button id="downloadId">Download</button>
<a href="./" style="display:contents"><button >back</button></a>
</div>

<?php
    }
} else { 
    echo ("<h1> No Data Found11</h1>");
    echo ("<p> no data found with this id please ty another one !!!</>");
    // echo "</div>";
}} ?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script>
    
    $(document).ready(function(){
        $('#downloadId').click(function(){
            // CreatePDFfromHTML();
            console.log("here12");
            downloadtable();
        });


        function downloadtable() {

            var node = document.getElementById('wrapper');

            domtoimage.toPng(node)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    downloadURI(dataUrl, "staff-id-card.png")
                })
                .catch(function (error) {
                    console.error('oops, something went wrong', error);
                });

            }



            function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
            }

        // Default export is a4 paper, portrait, using millimeters for units
        //Create PDf from HTML...
            // function CreatePDFfromHTML() {
            //     var HTML_Width = 360;
            //     var HTML_Height = 550;
            //     var top_left_margin = 0;
            //     var PDF_Width = 400;
            //     var PDF_Height = 700;
            //     var canvas_image_width = HTML_Width;
            //     var canvas_image_height = HTML_Height;

            //     var totalPDFPages = 1

            //     html2canvas($(".wrapper")[0]).then(function (canvas) {
            //         var imgData = canvas.toDataURL("image/jpeg", 1.0);
            //         var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            //         pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            //         for (var i = 1; i <= totalPDFPages; i++) { 
            //             pdf.addPage(PDF_Width, PDF_Height);
            //             pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            //         }
            //         pdf.save("Your_PDF_Name.pdf");
            //         $(".html-content").hide();
            //     });
            // }
            
        });

    
</script>

</body>
</html>



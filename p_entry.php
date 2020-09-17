<?php
session_start();
?>

<?php

/*if(is_uploaded_file($_FILES["image_file"])){


    $uploaddir = "./up/";
    $uploadfile = $uploaddir . basename($_FILES['image_file']['name'][0]);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['image_file']['tmp_name'][0], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
        print_r($uploadfile);
    }
    
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    
    print "</pre>";
}
*/

/*$path = './up/';

// ファイルがアップロードされているかと、POST通信でアップロードされたかを確認
if( !empty($_FILES['image_file[]']['tmp_name']) && is_uploaded_file($_FILES['image_file[]']['tmp_name']) ) {

	// ファイルを指定したパスへ保存する
	if( move_uploaded_file( $_FILES['image_file[]']['tmp_name'], $path.'upload_pic.jpg') ) {
		echo 'アップロードされたファイルを保存しました。';
	} else {
		echo 'アップロードされたファイルの保存に失敗しました。';
    }
}else{

    }*/
if(isset($_FILES["image_file"])){
    $_SESSION['data1']=1;
    print_r($_SESSION['data1']);
    //print_r($_SESSION['upFile']);

    $uploaddir = "./up/";
    $uploadfile = $uploaddir . basename($_FILES['image_file']['name'][0]);
    
    echo '<pre>';
    if (move_uploaded_file($_FILES['image_file']['tmp_name'][0], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
        print_r($uploadfile);
    }
    
    echo 'Here is some more debugging info:';
    print_r($_FILES);
    
    print "</pre>";
}
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
        <title>現場登録画面</title>
        <link rel="stylesheet" href = "style.css">
    </head>
    <body>

    <!--<h1>現場管理アプリ</h1>-->
    <h2>現場情報を入力してください。</h2>

        <form action="p_entry.php" method = "post" enctype="multipart/form-data">
            
            現場名<input type = "text" name = "project_name" value = ""><br />
            所在地<input type ="text" name="address" value = ""><br />
            概要<input type = "text" name="overview" value = ""><br />

            <h2>図面情報を登録してください。</h2>
            <p>
                
<!-- <input type="button" value="行追加" onclick="insertTable('pdf_information', 'file_array')" /> -->
			<label for="image_file">ファイルを選択してください</label><br>
            <input type="file" name="image_file[]" id="image_file" multiple="multiple" onchange=checkFile()><br>
            <!--<input type="text" id="selectfile" name="selectFile" value="" size="100" disabled>-->
        </p>
            <table id = "pdf_information">
                <tr>
                    <th style="WIDTH: 15px" id="no">No</th>
                    <th style="WIDTH: 150px" id=>ファイル名</th>
                    <th style="WIDTH: 30px"></th>
                </tr>
            </table>

            <input type="submit" name ="next" value = "次へ">
        </form>
       
    <script>

        function checkFile(){
            //var file_name = "";
            //var test = e.target.files;
            var p=[];
            var n=[];
            var f=[];
            var file_name = document.getElementById("image_file");
            var list ="";
            for(var i=0; i<file_name.files.length; i++){
                p.push(file_name.files[i].path);
                n.push(file_name.files[i].name);
                f.push(file_name.files[i]);
                //var formData = new FormData();
                //var request = new XMLHttpRequest();
                //request.open('POST', 'p_entry.php', true);
                //request.setRequestHeader('Content-Type', 'multipart/form-data; charset=utf-8');
                //request.setRequestHeader('Content-Type','text/plain');
                //var d = new FormData;
                //formData.set('file', f[i]);
                //d.append(test[i].name, test[i]);
                //request.send(d);
                //list += file_name[i].name + " , ";
            }
  
  
            
            //window.sessionStorage.setItem('upFile','f');

            //var result = list.substr(0, list.length-3);
            //document.getElementById("selectfile").value = result;
            //}else{
            //    var sample1 = document.getElementById("image_file").files;
            //    var list1 ="";
            //for(var i=0; i<file_name.length; i++){
            //    list1 += sample1[i].name + " , ";
            //}
            //var result1 = list1.substr(0, list1.length-3);
            //    var test = file_name + result1;
            //    document.getElementById("selectfile").value =test;
            //}
            //insertTable("pdf_information", n)

            //var file = file_name.files.length;
            //var file = file_array;
            //テーブル取得
            var table = document.getElementById("pdf_information");
            //var num = file.length;
            var num = p.length;
            for(var i = 0; i < num; i++){
                //行を行末に追加
            var row = table.insertRow(-1);
            //セルの挿入
            var cell1 = row.insertCell(-1);
            var cell2 = row.insertCell(-1);
            var cell3 = row.insertCell(-1);
            //削除ボタン
            var button = '<input type = "button" value = "削除" onClick= "deleteRow(this)" />';
            //行数取得
            var row_len = table.rows.length;
            //セルの内容入力
            cell1.innerHTML = row_len -1;
            cell2.innerHTML = n[i];
            cell3.innerHTML = button;
        }
    }

        function insertTable(id, file_array){
            var file = ["file1", "file2", "file3"];
            //var file = file_array;
            //テーブル取得
            var table = document.getElementById(id);
            var num = file.length;
            for(var i = 0; i < num; i++){
                //行を行末に追加
            var row = table.insertRow(-1);
            //セルの挿入
            var cell1 = row.insertCell(-1);
            var cell2 = row.insertCell(-1);
            var cell3 = row.insertCell(-1);
            //削除ボタン
            var button = '<input type = "button" value = "削除" onClick= "deleteRow(this)" />';
            //行数取得
            var row_len = table.rows.length;
            //セルの内容入力
            cell1.innerHTML = row_len -1;
            cell2.innerHTML = file[i];
            cell3.innerHTML = button;

            }

        }

        function deleteRow(obj) {
            // フォームデータを取得
    var formdata = new FormData(document.getElementById("my_form"));

// XMLHttpRequestによるアップロード処理
var xhttpreq = new XMLHttpRequest();
xhttpreq.onreadystatechange = function() {
    if (xhttpreq.readyState == 4 && xhttpreq.status == 200) {
        alert(xhttpreq.responseText);
    }
};
xhttpreq.open("POST", "p_entry_report_place.php", true);
xhttpreq.send(formdata);
    // 削除ボタンを押下された行を取得
    tr = obj.parentNode.parentNode;
    // trのインデックスを取得して行を削除する
    tr.parentNode.deleteRow(tr.sectionRowIndex);


}
    </script>
    </body>
</html>
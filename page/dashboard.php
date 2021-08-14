<?php
include '../process/session.php';
include '../modals/new_data.php';
include '../modals/logout-modal.php';
include '../modals/modal-view.php';
include '../modals/modal-edit.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" type="text/css" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<nav>
    <div class="nav-wrapper #006064 cyan darken-3">
      <a href="dashboard.php" class="brand-logo "><?php echo$name;?></a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">

        <li><a href="#"class="modal-trigger" data-target="new_data" onclick="create_student()">Register Student</a></li>

         <li> <a href="#"id="exportBtn" onclick="export_plan('student_list')">Export</li></a>
      <li>     <a href="../templates/student_template.csv" download>Download Template</li></a>

        <li><a href="#" data-target="modal-logout" class="modal-trigger">Logout</a></li>
      </ul>
    </div>
  </nav>

  
  <ul class="sidenav" id="mobile-demo">
      



        <li><a href="#" data-target="modal-logout" class="modal-trigger">Logout</a></li>
  </ul>

<br>
<div class="row">
    <div class="col m12">
         <div class="input-field col m3 ">
                    <input type="text" name="" id="date_from" class="datepicker" placeholder="Date From" value="<?=$server_date_only;?>">
                </div>

                <div class="input-field col m3 ">
                    <input type="text" name="" id="date_to" class="datepicker" placeholder="Date To" value="<?=$server_date_only;?>">
                </div>

                <div class="input-field col m3 ">
                  <input type="text" name="" id="student_namesearch" placeholder="Search Student" size="30" > 
                </div>
               
                <div class="input-field col m3 ">
                    <button class="btn col s12 btn #607d8b blue-grey" onclick="load_plan_list()" id="search-plan" style="border-radius:30px;"> Search</button>
                </div>
    </div>
</div>

  <div class="container">
    <fieldset  style="border:3px solid teal;">
        <legend>
            
            <h4>
            Student Table
        </h4>
        </legend>

      <div class="collection">

    <table border="1" id="student_list" class="responsive-table centered striped"> 
        <thead>
            <th>#</th>
            <th>Student Name</th>
            <th>Address</th>
            <th>Age</th>
            
            <th>Birthday</th>
            <th>Contact No.</th>
            
            <th colspan="3">Control</th>
        </thead>
        <tbody id="student_data"></tbody>
    </table>
   
                   
</div>    
</fieldset>         
</div>
</body>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.min.js">
</script>
<script type="text/javascript">
      $(document).ready(function(){
        $('.modal').modal({
            inDuration: 300,
            outDuration: 200
        });
       $('.sidenav').sidenav();
       load_list();
        $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoClose: true
    });
});

//new data modal
const create_student =()=>{
    $('#render_modal').load('../Forms/newdata.php');
}
    function save() {
            var full_name = $('#full_name').val();
            var address = $('#address').val();
            var age = $('#age').val();
            var birthday = $('#birthday').val();
            var contact_no = $('#contact_no').val();
        

        $.ajax({
            url: '../process/processor.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'save',
                full_name: full_name,
                address: address,
                age: age,
                birthday: birthday,
                contact_no: contact_no
            },success:function(response){
                // console.log(response);
                if(response == 'success') {
                    swal('SUCCESS', 'Data Saved', 'success');
                    load_list();
                    $('.modal').modal('close','#new_data');
                }else{
                    swal('FAILED', 'Data Not Saved', 'error');
                }
            }
        });
}
// SELECT
        function load_list(){
            var role = '<?=$role;?>';
            // console.log(role)
            $.ajax({
                url: '../process/processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_list',
                    role: role
                },success:function(response){
                    // console.log(response);
                    document.getElementById('student_data').innerHTML = response;
               
                }
            });
        }

        //delete
    function get_id(x){
            // console.log(x);
            $.ajax({
                url: '../process/processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'delete',
                    id:x
                },success:function(response){
                    // console.log(response);
                    if(response == 'deleted'){
                        swal('deleted!','','info');
                        load_list();
                    }else{
                        swal('FAILED!','FAILED!','error');
                    }
                }
            });
        } 

          function get_id_view(param){
            // GETTING VALUES FROM SQL QUERY
            // CONCATENATION OF VALUES

            var string = param.split('~!~');
            var id = string[0];
            var full_name = string[1];
            var address = string[2];
            var age = string[3];
            var birthday = string[4];
            var contact_no = string[5];

            // DISTRIBUTION OF VALUES TO HTML FORMS
            document.getElementById('viewID').value = id;
            document.getElementById('viewFullname').value = full_name;
            document.getElementById('viewAddress').value = address;
             document.getElementById('viewAge').value = age;
             document.getElementById('viewBirthday').value = birthday;
             document.getElementById('viewContact').value = contact_no;
            console.log(full_name);

        }
 function get_id_edit(param){
            // GETTING VALUES FROM SQL QUERY
            // CONCATENATION OF VALUES

            var string = param.split('~!~');
            var id = string[0];
            var full_name = string[1];
            var address = string[2];
            var age = string[3];
            var birthday = string[4];
            var contact_no = string[5];

            // DISTRIBUTION OF VALUES TO HTML FORMS
            document.getElementById('editID').value = id;
            document.getElementById('editFullname').value = full_name;
            document.getElementById('editAddress').value = address;
             document.getElementById('editAge').value = age;
             document.getElementById('editBirthday').value = birthday;
             document.getElementById('editContact').value = contact_no;
            console.log(full_name);
        }
//update
        function update_value(){
          var id = document.getElementById('editID').value;
            var newfull_name = document.getElementById('editFullname').value;
            var newaddress = document.getElementById('editAddress').value;
            var newage = document.getElementById('editAge').value;
            var newbirthday = document.getElementById('editBirthday').value;
            var newcontact_no = document.getElementById('editContact').value;

            
            $.ajax({
                url: '../process/processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'update_student',
                    id:id,
                    newfull_name:newfull_name,
                    newaddress:newaddress,
                    newage:newage,
                    newbirthday:newbirthday,
                    newcontact_no:newcontact_no
                },success:function(response){
                    console.log(response);
                    if(response == 'updated'){
                        // MODAL CLOSE
                        $('.modal').modal('close','#modal_edit');
                        // LOAD LIST OR REFRESH
                        load_list();
                        // SHOW ALERT
                        swal('SUCCESS!','PRODUCT UPDATED!','success');
                    }else{
                        swal('FAILED!','FAILED!','error');
                    }
                }
            });
        }

        const load_plan_list =()=>{
        var dateFrom = document.getElementById('date_from').value;
        var dateTo = document.getElementById('date_to').value;

            var full_name = document.getElementById('student_namesearch').value;
   
           

            $.ajax({
                url:'../process/admin_function.php',
                type: 'POST',
                cache:false,
                data:{
                    method:'displayStudentList',
                    dateFrom:dateFrom,
                    dateTo:dateTo,

                    full_name:full_name

                },success:function(response){
                    $('#student_data').html(response);
                }
            });
    }


    function export_plan(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'Student_List'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


</script>

</body>
</html>
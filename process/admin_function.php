<?php
 include '../process/conn.php';

 //search
$method = $_POST['method'];
    if($method == 'displayStudentList'){
        $from = $_POST['dateFrom'];
        $to = $_POST['dateTo'];
 $full_name = $_POST['full_name'];

             
            $q = "SELECT *FROM student_master_list Where date_created >='$from 00:00:00' AND date_created <= '$to 23:59:59' AND full_name LIKE '$full_name%'";
        $stmt = $conn->prepare($q);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $c = 0;

            foreach($stmt->fetchALL() as $x){
                // $date = explode('-',$x['date']);
                // $year = $date[0];
                // $month = $date[1];
                // $exp = intval($year) + 5;
                // $expdate = $exp."-".$month."-".$date;

                $c++;
                    
                    echo '<tr>';
                echo '<td>'.$c.'</td>';
                echo '<td>'.$x['full_name'].'</td>';
                echo '<td>'.$x['address'].'</td>';
                echo '<td>'.$x['age'].'</td>';
                echo '<td>'.$x['birthday'].'</td>';
                echo '<td>'.$x['contact_no'].'</td>';
                echo '<td><button class="btn teal modal-trigger" data-target="modal_view" onclick="get_id_view(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">view</button></td>';
                
                echo '<td><button class="btn blue modal-trigger" data-target="modal_edit" onclick="get_id_edit(&quot;'.$x['id'].'~!~'.$x['full_name'].'~!~'.$x['address'].'~!~'.$x['age'].'~!~'.$x['birthday'].'~!~'.$x['contact_no'].'&quot;)">edit</button></td>';
                echo '</tr>';
            }
            
        }else{
            echo '<tr>';
            echo '<td colspan="10" style="text-align:center;">NO RESULT</td>';
            echo '</tr>';
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
</head>
<body>
    <div class="container">
        <div class="header-section" style="text-align: center; padding: 8px auto;">
            <p class="main-title" style="font-size: 28px; margin-bottom:0;">
                HCOI IAS Coaching & Guidance Institute
            </p>
            <p>
                BAIT-UL-HUJJAJ (HAJ HOUSE), 7-A, M.R.A MARG <br>
                (PLATON ROAD), MUMBAI-400001 <span>PHONE : 022-22717100 / 148/ 149</span> <br>
                FAX : 022-22635266 <span>WEBSITE : www.hajcommittee.gov.in</span>
            </p>
            <tr><hr></tr>
        </div>
        <div class="addmission" style="text-align:center; font-size: 22px;">
            CANDIDATE FORM
        </div>
        <div class="candidate-row" style="display: grid; grid-template-columns: 80% 20%;">
            <p class="candidate-id" style="margin-left: 15px; margin-top: -30px; ">Registration Id : <?php echo e($row->candidate_id); ?></p>
            <p class="candidate-image" style="margin-left: 20px;"><img src="<?php echo e(url('public/img/default.jpg')); ?>" style="height: 120px; width: 120px;"></p>
        </div>
        <table class="data-table" cellpadding="10" style="">
            <tr>
                <td >Name </td><td colspan="3"><?php echo e($row->full_name); ?></td>
            </tr>
            <tr>
                <td>Father Name </td><td> <?php echo e($row->father_name); ?></td>
                <td>Mother Name </td><td> <?php echo e($row->mother_name); ?></td>
            </tr>
            <tr>
                <td>Mobile </td><td > <?php echo e($row->mobile_number); ?></td>
                <td>Father Mobile </td><td > <?php echo e($row->father_mobile_number); ?></td></tr>
            
            <tr>
            <tr>
                <td>Previous Education </td><td><?php echo e($row->qualification); ?></td>
                <td>UPSC Prelim Attempt </td><td><?php echo e($row->upsc_prelim_attemp); ?></td>
            
            <tr>
                <td>Native Address </td><td colspan="3"><?php echo e($row->native_address); ?></td>
            </tr>
            <tr>
                <td>Parent Address </td><td colspan="3"><?php echo e($row->parent_address); ?></td>
            </tr>
            <tr>
                <td>Annual Income </td><td colspan="3"><?php echo e($row->yearly_income); ?> Rs</td>
            </tr>
            <tr>
                <td>Local Guardian Name </td><td colspan="3"><?php echo e($row->local_guardian_name); ?></td>
            </tr>
            <tr>
                <td>Local Guardian Mobile </td><td colspan="3"><?php echo e($row->local_guardian_mobile_number); ?></td>
            </tr>
            <tr>
                <td>Local Guardian Address </td><td colspan="3"><?php echo e($row->local_guardian_address); ?></td>
            </tr>
            <tr>
                <td>Date Of Birth </td><td ><?php echo e($row->date_of_birth); ?></td>
                <td>Date Of Admission </td><td><?php echo e($row->date_of_admission); ?></td>
            </tr>
        </table>
        <div style="height: 150px; display: grid; grid-template-columns: 50% 50%;">
            <p style="margin-left: 100px; margin-top: 30px;">Director</p>
            <p style="margin-left: 200px; margin-top: 30px;">Accountant</p>
        </div>
    </div>
    <button onclick="window.print()">Print</button>
</body>
</html>

<style>
@import  url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');
body{
    font-family: 'Source Sans Pro', sans-serif;
}
.container{
    max-width: 794px;
    max-height: 1122px;
    margin: 60px auto;
    border: 1px solid black;
}
.data-table{
    width:100%
}
/* table {
  border-collapse: collapse; 
}
table, th, td {
  border: 1px solid black;
} */
table {
  border-collapse: collapse;
}
table td {
  border: 1px solid black; 
}
table tr td:first-child {
  border-left: 0;
}
table tr td:last-child {
  border-right: 0;
}
</style><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/FormPrint.blade.php ENDPATH**/ ?>
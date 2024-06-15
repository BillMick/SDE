<?php
    if(isset($_POST['search']))
    {
        $_POST['search'] = strip_tags($_POST['search']);
        try
        {
            $c = 0;
            $indicateur = 0;
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE identityDocumentNumber = :a OR registrationNumber = :a OR workStatus = :a OR grade = :a OR post = :a OR department = :a OR accessDegree = :a");
            $request->bindParam(':a',$_POST['search']);
            $request->execute();
            if($result = $request->fetch())
            { ?>
                <div style = "display : grid; grid-template-columns : repeat(9,1fr);">
                    <div><b>#</b></div>
                    <div><b>Registration Number</b></div>
                    <div><b>Registration Date</b></div>
                    <div><b>Hiring Date</b></div>
                    <div><b>Department</b></div>
                    <div><b>Grade</b></div>
                    <div><b>Post</b></div>
                    <div><b>Access Degree</b></div>
                    <div><b>Work Status</b></div>
                </div> <?php
                while ($result = $request->fetch())
                {
                    $indicateur = 1;
                    $c = $c + 1;?>
                    <div style = "display : grid; grid-template-columns : repeat(9,1fr);">
                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['registrationDate']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['hiringDate']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['department']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['grade']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['post']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['accessDegree']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['workStatus']; ?></b></div>
                    </div>
                <?php
                }    
            }
            if($indicateur != 1);
            {
                $request = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :a OR identityDocument = :a OR firstname = :a OR surname = :a OR email = :a OR phoneNumber = :a OR maritalStatus = :a OR parentName = :a OR parentPhoneNumber = :a OR numberOfChildren = :a OR country = :a OR residence = :a OR birthdate = :a OR gender = :a");
                $request->bindParam(':a',$_POST['search']);
                $request->execute();
                    ?>
                    <div style = "border : solid 1px; display : grid; grid-template-columns : repeat(13,1fr);">
                        <div><b>#</b></div>
                        <div><b>Registration Number</b></div>
                        <div><b>Name</b></div>
                        <div><b>Gender</b></div>
                        <div><b>Birthdate</b></div>
                        <div><b>Email</b></div>
                        <div><b>Phone Number</b></div>
                        <div><b>Residence</b></div>
                        <div><b>Identity Document</b></div>
                        <div><b>Marital Status</b></div>
                        <div><b>Number Of Children</b></div>
                        <div><b>Parent Name</b></div>
                        <div><b>Parent Phone Number</b></div>
                    </div> <?php
                while ($result = $request->fetch())
                {
                    $c = $c + 1;?>
                    <div style = "border : solid 1px; display : grid; grid-template-columns : repeat(13,1fr);">
                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                        <div class = "gridTaskP"><b><?php 
                            $request1 = $bdd->prepare("SELECT * FROM BankANDDoc WHERE identityDocumentNumber = :a");
                            $request1->bindParam(':a',$result['identityDocumentNumber']);
                            $request1->execute();
                            $result1 = $request1->fetch();
                            echo $result1['registrationNumber'];
                        ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['firstname'].' '.$result['surname']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['gender']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['birthdate']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['email']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['phoneNumber']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['residence'].' IN '.$result['country']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['identityDocument'].' N°'.$result['identityDocumentNumber']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['maritalStatus'].' with '.$result['numberOfChildren'].' kid(s)'; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['parentName']; ?></b></div>
                        <div class = "gridTaskP"><b><?php echo $result['parentPhoneNumber']; ?></b></div>

                    </div>
                <?php
                }
            }
        }
        catch (PDOException $e)
        { ?>
            <p style = "color : red;">Data insertion failed !</p>
        <?php
            echo ''.$e->getMessage();
        }
    }
?>
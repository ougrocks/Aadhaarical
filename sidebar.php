
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <?php
                $aadhaar_number = $_SESSION["aadhaar"];
                $name_query = "SELECT name,image FROM login WHERE aadhaar_no = '$aadhaar_number'";
                $result_name_query = mysql_query($name_query);
                $row = mysql_fetch_assoc($result_name_query);
                $name = $row["name"];
                $image = "data:image/jpeg;base64,".$row["image"];
                ?>

                <p class="centered"><a href="home.php"><img src="<?=$image;?>" class="img-circle" width="60"></a></p>
                <h5 class="centered"><?=$name;?></h5>

                <li class="sub-menu">
                      <a href="home.php">
                          
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          
                          <span>Apply for Temporary Licence</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="learning.php">Fill Forms</a></li>
                          <li><a  href="payment.php">Make Payment</a></li>
                          <li><a  href="test/index.php">Give Test</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <span>Apply for Permanent Licence</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form4.php">Fill Forms</a></li>
                          <li><a  href="payment.php">Make Payment</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >

                          <span>Account Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="https://uidai.gov.in/update-your-aadhaar-data.html">Update Aadhar Details</a></li>
                          <li><a  href="change_pwd.php">Change Account Password</a></li>
                          
                      </ul>
                  </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->


<?php
class contents{
    public function main_content(){
?>
<<div class="row align-items-md-stretch">
        <div class="col-md-9">
          <div class="h-100 p-5 text-bg-dark rounded-3">
            <h2>Main Content</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
          </div>
        </div>
<?php
    }
    public function about_content(){
?>
<div class="row">
<div class="content">
    <H1>About Content</H1>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
<?php
    }
    public function side_bar(){
        ?>
        <div class="col-md-3">
          <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>Side bar</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi explicabo sequi quas iure reprehenderit earum saepe eaque? Repudiandae praesentium ad voluptatum quos eaque sapiente, accusamus sed nulla ab quam velit.</p>
            <button class="btn btn-outline-secondary" type="button">Example button</button>
          </div>
        </div>
        
      </div>
</div>
        <?php
    }
    public function sign_up(){
        ?>

        <div class="signup">
            <form method= "POST" action="<?php $this->submission(); ?>" enctype="multipart/form-data">
                <h2>Register</h2>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="text" name = "username" placeholder="Username" required>                
                <input type="password" name= "password" placeholder="Password" required>
                <input type="password" name = "repass" placeholder="Re-enter Password" required>
                <button type="submit">Register Now</button> 

            </form>
        </div>
        <?php
    }
    public function submission(){
        if ($_SERVER['REQUEST_METHOD']== 'POST'){
            require "./misqli.php";
            $conn->query();
            $name = $_POST["name"];
            $email = $_POST["email"];
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $repass = $POST["repass"];
            if($pass == $repass){
                $hashpass= password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (fullname, username, email, password) VALUES ($name, $user, $email, $hashpass)";
            }
        }
        
    }
    public function user_details(){
        require "./misqli.php";
        $result = $conn->query("SELECT * from users");

        ?>
        <h3>User details</h3>
                <table>
                    <th>User ID</th>
                    <th>Full Names</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
        <?php
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                print "<tr>";
                print "<td>". $row["userId"] ."</td>";
                print "<td>". $row["fullname"] ."</td>";
                print "<td>". $row["username"] ."</td>";
                print "<td>". $row["email"] ."</td>";
                print "<td>". $row["created"] ."</td>";
                print "<td>". $row["updated"] ."</td>";
                print "</tr>";
            }

        }
        ?>
        </table>
        <?php
    }
   
}

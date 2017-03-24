<?php  
 $connect = mysqli_connect("localhost", "root", "", "asp");  
 $output = '';  
 $sql = "SELECT * FROM login ORDER BY username DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
           <h3 align="center"><font color="#2F4F4F">Edit Roles</font></h3><br/>
                <tr>  
                     <th>username</th>  
                     <th>password</th>  
                     <th>role</th>  
                     <th>Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["username"].'</td>  
                     <td class="password" data-id1="'.$row["username"].'" contenteditable>'.$row["password"].'</td>  
                     <td class="role" data-id2="'.$row["username"].'" contenteditable>'.$row["role"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["username"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="username" contenteditable></td>  
                <td id="password" contenteditable></td>  
                <td><select name="role"  id="role"><font color="#000000">
                                                            <option value="admin">admin</option>
                                                            <option value="staff">staff</option>
                                                            <option value="client">client</option>
                                                            
                                                     </font></select></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>
                     <tr>  
                <td id="username" contenteditable></td>  
                <td id="password" contenteditable></td>  
                <td id="role" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  
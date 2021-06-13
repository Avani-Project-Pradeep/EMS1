
<!-- MESSAGE BOX FOR EMPLOYEE -->
<div class="container" style="width:fit-content;">
    <div class="form-group">
      <label for="comment">Message Box:</label>
      <textarea class="form-control" rows="10" cols="100" id="comment" name="text" style="font-size:18px" readonly>
      
      << IMPORTANT MESSAGES >>
      <?php
 

     $ee_id=$_SESSION['id'];

//FETCHING MESSAGE FROM DATABASE
     $query = "SELECT * FROM employee_professional_details WHERE ee_id=$ee_id";

     $selectquery = mysqli_query($connection2, $query);
 


     while ($row = mysqli_fetch_assoc($selectquery)) {

        $ee_message = $row['ee_messages'];
//DISPLAYING MESSAGE INSIDE TEXTAREA
        echo $ee_message;
    }




     ?>
      
      
      
       </textarea>
    </div>
  </form>
</div>

</body>
</html>

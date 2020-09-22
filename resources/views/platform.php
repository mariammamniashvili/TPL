
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
​
<div class="container">
  <h2>Insurance applications</h2>
  <p></p>            
  <table class="table table-striped table-responsive-md btn-table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Id</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Birthday</th>
              <th>Category</th>
              <th>Model</th>
              <th>Issue date</th>
              <th>id</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          
            <?php 
			$limit_text=12;
            if(isset($insurance["data"]) && !empty($insurance["data"])){
                foreach($insurance["data"] as $ins){
                foreach(json_decode($categories) as $c){
                    if($c->id == $ins["manufacturer"]) {
                        $category_name=$c->manufacturer_name;
                    }
                  }
                foreach(json_decode($models) as $m){
                    if($m->id == $ins["model"]) {
                        $model_name=$m->model_name;
                    }
                  }
                 if($ins["is_deleted"] != 1){
					echo '
					<tr id="team">
                        <td title="">'.$ins["id"].'</td>
						<td title="">'.$ins["first_name"].'</td>
						<td title="">'.$ins["last_name"].'</td>
						<td title="">'.$ins["user_id"].'</td>
						<td>'.$ins["phone"].'</td>
						<td>'.$ins["email"].'</td>
                        <td title="">'.$ins["birthday"].'</td>
						<td title="">'.$category_name.'</td>
						<td title="">'.$model_name.'</td>
						<td>'.$ins["issue_date"].'</td>
						<td>'.$ins["registration_number"].'</td>
                        <td>'.$ins["status"].'</td>
						<td>
						<a class="dropdown-item edit" href="/status/'.$ins["id"].'/'.$ins["status"].'"  data-toggle="modal"  ><i class="fa fa-pencil-square-o"></i>Edit Status</a>|<a class="erase" id="erase" href="/delete/'.$ins["id"].'" onClick=""><i class="fa fa-trash-o"></i>Delete</a>
					 	</td>
					</tr>';
                }
                }
            }
            ?>
          </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new" data-whatever="@getbootstrap">Add New</button>

<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action='register' method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Firs Name *</label>
            <input type="first" name="first_name" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Last Name *</label>
            <input type="text" name="last_name" class="form-control" id="recipient-name" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id *</label>
            <input type="text" name="user_id" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Phone *</label>
            <input type="text"  name="phone" class="form-control" id="recipient-name" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email </label>
            <input type="email"  name="email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Birthday *</label>
            <input type="text" placeholder="yyyy-dd-mm" name="birthday"  class="form-control" id="recipient-name" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Car Category *</label>
            <select name="categories" id="categories" class="form-control name_list" required>
            <option value="">choose Category</option>
            <?php
                if($categories!=""){
                    foreach(json_decode($categories) as $c){
                      echo  '<option  value="'.$c->id.'">'.$c->manufacturer_name.'</option>';
                    }
                }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Car Model *</label>
            <select name="models" id="models" class="form-control name_list" disabled required>
            <option value="">choose</option>
            <?php
                if($models!=""){
                    foreach(json_decode($models) as $m){
                      echo  '<option value="'.$m->manufacturer_id.'">'.$m->model_name.'</option>';
                    }
                }
                ?>
            </select>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Car Issue Date *</label>
            <input type="text" placeholder="yyyy-dd-mm" name="issue_date" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Car Registration Id *</label>
            <input type="text"  name="registration_number" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Photo *</label>
            <input type="file"   name="image" class="form-control" id="recipient-name" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</div>
​
</body>
</html>
​
<script>
$(function () {
   var interval = $('#models option').clone();
   $('#models option').show();
    $('#categories').on('change', function() {
        var val = this.value;
        if(val!=''){$('#models').removeAttr("disabled");}
        $('#models').html( 
            interval.filter(function() { 
              return this.value.indexOf(val) === 0; 
            })
        );
    })
    .change();
  });

</script>

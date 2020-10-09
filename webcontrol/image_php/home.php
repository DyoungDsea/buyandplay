<form action="insert.php" method="post" enctype="multipart/form-data" name="frmpic" >
<input type="hidden" name="id"  value="<? echo $row['id']; ?>" />
<input type="hidden" name="dname"  value="<? echo $row['dname']; ?>" />
<input type="hidden" name="oldpic1"  value="<? echo $row['dpic']; ?>" />
<input type="hidden" name="oldpic2"  value="<? echo $row['dpic2']; ?>" />
<b><? echo $_SESSION["msg"]; ?></b>
			  
  <div class="row">
	<div class="col-sm-12">
	<p>Browse Photo:
	<input name="photo" type="file" class="form-control"  />
	</p>
	<p>Browse Photo:
	<input name="photo2" type="file" class="form-control"  />
	</p>
	<hr>
	<p>
	<button type="submit" class="btn btn-primary"> Upload Photo </button>
	<a href="crm-customer-profile?profile=<? echo $profile; ?>" class="btn btn-secondary" >Cancel</a>
	</p>
	</div>
  </div>

</form>
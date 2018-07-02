<form action="#" method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" id="search" class="form-control" placeholder="Search By Student ID or Name">
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <div id="search_results"></div>
          
     <?php 
	 
if (isset($_POST['search_term'])) {
    $search_term = htmlentities($mysqli->real_escape_string($_POST['search_term']));
	

}
	 
	 ?>                       
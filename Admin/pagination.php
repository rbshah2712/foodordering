<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<div class="card-footer clearfix">
<ul class="pagination pagination-sm m-0 float-right">
  <!--<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>-->
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?> class='page-item'>
<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?> class="page-link">Previous</a>
</li>

<?php 
if ($total_no_of_pages <= 10){  	 
for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
if ($counter == $page_no) {
echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
}else{
echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
}
}
}
elseif($total_no_of_pages > 10){

if($page_no <= 4) {			
for ($counter = 1; $counter < 8; $counter++){		 
if ($counter == $page_no) {
echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
}else{
echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
}
}
echo "<li><a>...</a></li>";
echo "<li class='page-item'><a href='?page_no=$second_last' class='page-link'>$second_last</a></li>";
echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";
}

elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
echo "<li class='page-item'><a href='?page_no=1' class='page-link'>1</a></li>";
echo "<li class='page-item'><a href='?page_no=2' class='page-link'>2</a></li>";
echo "<li><a>...</a></li>";
for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
if ($counter == $page_no) {
echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
}else{
echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
}                  
}
echo "<li><a>...</a></li>";
echo "<li class='page-item'><a href='?page_no=$second_last' class='page-link'>$second_last</a></li>";
echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";      
}

else {
echo "<li class='page-item'><a href='?page_no=1' class='page-link'>1</a></li>";
echo "<li class='page-item'><a href='?page_no=2' class='page-link'>2</a></li>";
echo "<li><a>...</a></li>";

for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
if ($counter == $page_no) {
echo "<li class='active'><a class='page-link'>$counter</a></li>";	
}else{
echo "<li class='page-item'><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
}                   
}
}
}
?>

<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?> class="page-item">
<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class='page-link'>Next</a>
</li>
<?php if($page_no < $total_no_of_pages){
echo "<li class='page-item'><a href='?page_no=$total_no_of_pages' class='page-link'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
</div>
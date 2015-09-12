<?php
if (isset($div_main_id) && $div_main_id != "") {
    print "</div> <!-- end of div main-->";
} else { ?>


<p><br></p>
<p><br></p>


<div class="footer">
<p>Powered by <a href="../about/">&Pi;BB</a> <br/>Copyright &copy; 2013-2014</p>
</div>


</div> <!--end of div main-->
</div> <!--end of div main_panel-->
<?php } ?>




<script type="text/javascript">
    document.body.className += " page page-id-2 page-template-default";
</script>

<?php
get_footer();
if (is_user_logged_in()) { include("admin_bar.php"); }
?>

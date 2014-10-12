<html>
<body>
<?php echo $error;?>
<?php echo form_open_multipart('resume/do_upload');?>
Browse: <input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="Upload Resume" />
</form>
</body>
</html>
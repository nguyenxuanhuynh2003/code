<?php 
//Template Name: profile 

get_header(); ?>

<?php require get_template_directory() . '/template/arr-adress.php';

	
?>
<?php  
if ( is_user_logged_in() ) { 
		$user_id = get_current_user_id();
		
}
	
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Lấy giá trị từ form
  		
		$name = $_POST['user_name'];
	    $gender = $_POST['user_gender_id'];
	    $age = $_POST['user_age_id'];
	    $country = $_POST['user_country_id'];
	    $residence = $_POST['user_residence_id'];
	   
			  
	    // Cập nhật thông tin người dùng
	 
	    	update_user_meta( $user_id, 'first_name', $name);
	    update_field('gender', $gender, 'user_'.$user_id);
	    update_field('age', $age, 'user_'.$user_id);
	    update_field('country', $country, 'user_'.$user_id);
	    update_field('residence', $residence, 'user_'.$user_id);
			
		if(!empty($_FILES['user_photo_image']['name']) && isset($_FILES['user_photo_image'])) {
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
		  // Kiểm tra nếu có tệp được gửi lên
		  	$image_url = wp_get_attachment_url($image_id);// Tải tệp lên Media Library và lấy ID
		    $image_id = media_handle_upload('user_photo_image', 0);
		    $field_key = 'avatar';
		 	update_field($field_key, $image_id, 'user_' . $user_id);
		 	$ass= "更新しました";
		 		echo '<div class="alert alert-success ass" id="success-message">' . $ass . '</div>';

		 	?>
		
	      	<?php

		}

	
}

	$user_data = get_userdata($user_id);
  	$user_display_name =  $user_data->first_name;
  	$user_email = $user_data->user_email;

?>
<!-- <div class="alert alert-success ass" id="success-message" ><?php echo $ass; ?></div> -->


<div class="section-padding-50 grey-bg-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 order-lg-1">
				<div class="lst-dash-user-profile">
					<div class="thumb">
						<?php 
							    $avatar_id = get_field('avatar', 'user_'.$user_id);
							    $avatar_url = wp_get_attachment_image_url($avatar_id, 'full');
							    if($avatar_url){


							?>
						<img alt="" class="img-fluid rounded-circle" src="<?php echo $avatar_url;?>" style="margin-bottom: 6px; height: 48px;" width="48px">
					<?php } else {?>
						<img alt="" class="img-fluid rounded-circle" src=" https://att-japan.net/noimage.png" style="margin-bottom: 6px; height: 48px;" width="48px">
						<?}?>
					</div>
					<div class="profile-body">

						<h4><?php echo $user_display_name;
						?></h4>
						<span><?php echo $user_email;
						?></span>
					</div>
				</div>
				<div class="lst-dash-side-nav">
					<ul class="dashboard-nav" id="dashboard-nav">
						<li class="navigation-item">
							<a href="<?php echo get_page_link(5102); ?>"><i class="fas fa-heart"></i>ブックマーク済み</a>
						</li>
						<li class="navigation-item"><a class="active" href="<?php echo get_page_link(2731); ?>"><i class="fas fa-user"></i>プロフィールの編集</a></li>
					</ul>
					<a class="logout-button" href="<?php echo wp_logout_url( home_url() ); ?>" data-confirm="ログアウトしますか？">ログアウト</a>

					
				</div>
			</div>
			<div class="col-lg-6 order-lg-1">
				<div class="dashboard-section dashboard-my-profile">
					<div class="dashboard-section-body">
						<form action="<?php echo get_the_permalink();?>" id="myfrom" method="post" enctype="multipart/form-data" class ="simple_form form-vertical" >
								<div class="row">
									<div class="col">
										<div class="upload-profile-photo">
											<?php 
												if($avatar_url){
													?>
												<div class="update-photo" id="update-photo_2">
													<img alt="" src=" <?php echo $avatar_url;?>" width="300">
												</div>
												<?php
												}else{
											?>
											<div class="update-photo" id="update-photo_2" >
												<img alt="" src=" https://att-japan.net/noimage.png" width="300">
											</div>
											<?php } ?>
											<div class="file-upload">
												<div class="form-group file optional user_photo_image">
													<input class="form-control-file file optional file-input" type="file" name="user_photo_image" id="user_photo_image">
												</div>
												Change
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-group string required user_name form-group-valid">
										<label class="string required" for="user_name">ニックネーム  <font color="crimson"><strong><abbr title="required">*</abbr></strong></font></label>
										<input class="form-control is-valid string required" required  maxlength="64" size="64" type="text" value="<?php echo $user_display_name;?>" name="user_name" id="user_name" >
										<span id="user_name_err_msg" style="display:none;"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="form-group select optional user_gender form-group-valid">
										<label class="select optional" for="user_gender_id">性別 <font color="crimson"><strong></strong></font></label>
										<?php 
										$gender =  get_field('gender','user_'.$user_id);
										
										?>
										<select class="form-control is-valid select optional" name="user_gender_id" id="user_gender_id">
											<option value="男性" <?php if($gender == '男性') echo "selected" ?>>男性</option>
											<option value="女性" <?php if($gender =='女性' ) echo "selected" ?>>女性</option>
											<option value="無回答" <?php if($gender == '無回答') echo "selected" ?>>無回答</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="form-group select optional user_age form-group-valid">
										<label class="select optional" for="user_age_id">年齢 <font color="crimson"><strong></strong></font></label>
										<?php 
										$age=  get_field('age','user_'.$user_id);
										?>
										<select class="form-control is-valid select optional" name="user_age_id" id="user_age_id">
											
											<option value="19"<?php if($age =='19') echo "selected"?>>-19</option>
											<option value="20-29"<?php if($age =='20-29') echo "selected"?>>20-29</option>
											<option value="30-39"<?php if($age =='30-39') echo "selected"?>>30-39</option>
											<option value="40-49"<?php if($age =='40-49') echo "selected"?>>40-49</option>
											<option value="50-59"<?php if($age =='50-59') echo "selected"?>>50-59</option>
											<option value="60-"<?php if($age =='60-') echo "selected"?>>60-</option>
											<option value="無回答"<?php if($age =='無回答') echo "selected"?>>無回答</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class = "form-group select optional user_country form-group-valid">
									<label class="select optional" for="user_country_id">出身地 <font color="crimson"><strong></strong></font></label>
									<select name="user_country_id" id="user_country_id" class="form-control is-valid select optional">
										<?php 
										$country=  get_field('country','user_'.$user_id);
										var_dump($country);
										foreach ($countries as $value) {?>
											<option  value="<?php echo $value?>" <?php if($country == $value) echo "selected"?>><?php echo $value?></option>
										<?php }
										?>
									
									</select>
									</div>
								</div>
								<div class = "form-group">
									<div class = "form-group select optional user_residence form-group-valid">
										<label class="select optional" for="user_residence_id">居住地 <font color="crimson"><strong></strong></font></label>
										<select name="user_residence_id" id="user_residence_id" class ="form-control is-valid select optional">
										<?php 
										$residence=  get_field('residence','user_'.$user_id);
										foreach ($countries as $value) {?>
											<option  value="<?php echo $value?>" <?php if($residence == $value) echo "selected"?>><?php echo $value?></option>
										<?php }
										?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="form-group email required disabled user_email form-group-valid">
										<label class="email required disabled" for="user_email">Eメール <font color="crimson"><strong><abbr title="required">*</abbr></strong></font></label>
										<input class="form-control is-valid string email required disabled" disabled="disabled" required="required" aria-required="true" type="email" value="<?php echo $user_email;?>" name="user_email" id="user_email">
									</div>
								</div>
								<button class="button" type="submit">プロフィールの更新</button>
							</form> 
					</div>
				</div>
			</div>
			<div class="col-lg-3 order-lg-1">
				<?php dynamic_sidebar('customer-sidebar'); ?>
			</div>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>


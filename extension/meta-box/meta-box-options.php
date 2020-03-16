<?php

add_filter( 'rwmb_meta_boxes', 'getdesign_register_meta_boxes' );

function getdesign_register_meta_boxes() {

    /* Start meta box post */
    $getdesign_meta_boxes[] = array(

        'id'         => 'post_format_option',
        'title'      => esc_html__( 'Post Format', 'getdesign' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'id'               => 'getdesign_gallery_post',
                'name'             => 'Gallery',
                'type'             => 'image_advanced',
                'force_delete'     => false,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
            ),

            array(
                'id'            => 'getdesign_video_post',
                'name'          => 'Video Or Audio',
                'type'          => 'oembed',
            ),

        )

    );
    /* End meta box post */

	/* Start meta box course */

	$getdesign_meta_boxes[] = array(

		'id'            =>  'course_meta_box_option',
		'title'         =>  esc_html__( 'Khóa học', 'getdesign' ),
		'post_types'    =>  array( 'course' ),
		'context'       =>  'normal',
		'priority'      =>  'low',
		'fields'        =>  array(

			// Off line
			array(
				'type'  =>  'heading',
				'name'  =>  'Khóa học off line',
			),

			array(
				'name'          =>  'Tiêu đề',
				'id'            =>  'course_meta_box_off_heading',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  esc_html__( 'Thông tin khoá học off tại lớp', 'getdesign' )
			),

			array(
				'name'          =>  'Ngày học',
				'id'            =>  'course_meta_box_off_nh',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '12/03 (Liên hệ để được xếp lịch mới)'
			),

			array(
				'name'          =>  'Số buổi học',
				'id'            =>  'course_meta_box_off_sbh',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '10 buổi'
			),

			array(
				'name'          =>  'Ngày học trong tuần',
				'id'            =>  'course_meta_box_off_nhtt',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  'Thứ 3 & thứ 5'
			),

			array(
				'name'          =>  'Địa chỉ',
				'id'            =>  'course_meta_box_off_dc',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  'Tầng 7, Số 10 Trần Phú, P. Mộ Lao, Hà Đông, Hà Nội'
			),

			array(
				'name'          =>  'Khung thời gian',
				'id'            =>  'course_meta_box_off_ktg',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '19h - 21h'
			),

			array(
				'name'          =>  'Học phí (VND)',
				'id'            =>  'course_meta_box_off_hp',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '5.000.000'
			),

			// On line
			array(
				'type'  =>  'heading',
				'name'  =>  'Khóa học on line gia sư 1-1',
			),

			array(
				'name'          =>  'Tiêu đề',
				'id'            =>  'course_meta_box_on_heading',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  esc_html__( 'Thông tin khoá học online gia sư 1-1', 'getdesign' )
			),

			array(
				'name'          =>  'Ngày học',
				'id'            =>  'course_meta_box_on_nh',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  'Đăng ký để được xếp lịch riêng'
			),

			array(
				'name'          =>  'Số buổi học',
				'id'            =>  'course_meta_box_on_sbh',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '10 buổi'
			),

			array(
				'name'          =>  'Ngày học trong tuần',
				'id'            =>  'course_meta_box_on_nhtt',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  'Tuần 2 buổi'
			),

			array(
				'name'          =>  'Địa chỉ',
				'id'            =>  'course_meta_box_on_dc',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  'Học online trực tiếp'
			),

			array(
				'name'          =>  'Khung thời gian',
				'id'            =>  'course_meta_box_on_ktg',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '2h/buổi(Linh hoạt)'
			),

			array(
				'name'          =>  'Học phí (VND)',
				'id'            =>  'course_meta_box_on_hp',
				'size'          =>  50,
				'type'          =>  'text',
				'placeholder'   =>  '6.000.000'
			),

			array(
				'name'          =>  'Mô tả',
				'id'            =>  'course_meta_box_on_mo_ta',
				'type'          =>  'textarea',
				'placeholder'   =>  'Đối với khóa học online gia sư 1-1, phù hợp với các bạn ở xa'
			),

		)

	);

	/* End meta box course */

    return $getdesign_meta_boxes;

}
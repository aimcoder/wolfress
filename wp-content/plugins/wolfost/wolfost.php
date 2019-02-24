<?php
/**
 * Plugin Name: Wolf Posts
 * Description: Create Post Demo
 * Version: 1.0.0
 * Author: Nguyen Tuan Sieu
 * Author Uri: https://sieu.vn
 * Text Domain: Kimochi
 */

require_once('vendor/autoload.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

class Wolfost {
  public function __construct () {
    add_action('admin_menu', array($this, 'adminMenu'));
  }

  public function adminMenu () {
    add_submenu_page('tools.php', 'Post Demo', 'Post Demo', 'manage_options', 'wolfost_demo', array(
      $this,
      'adminLayout'
    ));
  }

  public function adminLayout () {
    if (isset($_POST['submit-post'])) {
      $catId = $_POST['cat_id'] ?? '';
      if ($catId > 0) {
        $this->insertPosts($catId);
      }
    }

    if (isset($_POST['submit-category'])) {
      $this->insertCategories();
    }
    ?>
    <div class="wrap">
      <h2><?php _e( 'Create Post demo', 'kimochi' ) ?></h2>
      <form id="kimochi_post_demo" method="post">
        <?php wp_dropdown_categories( array(
          'hide_empty'       => 0,
          'name'             => 'cat_id',
          'id'               => 'categories',
          'hierarchical'     => true,
          'show_option_none' => __( 'None' ),
        ) ); ?>
        <input type="submit" value="Create Post demo" name="submit-post" class="button button-primary"/>
      </form>

      <h2><?php _e( 'Create Category demo', 'kimochi' ) ?></h2>
      <form id="kimochi_category_demo" method="post">
        <?php wp_dropdown_categories( array(
          'hide_empty'       => 0,
          'name'             => 'parent',
          'id'               => 'parent',
          'hierarchical'     => true,
          'show_option_none' => __( 'None' ),
        ) ); ?>
        <input type="submit" value="Create Category demo" name="submit-category" class="button button-primary"/>
      </form>
    </div>
    <?php
  }

  public function insertCategories() {
    for ( $i = 0; $i < 10; $i ++ ) {
      $faker = new Faker\Generator();
      $faker->addProvider( new Faker\Provider\en_US\Person( $faker ) );
      $faker->addProvider( new Faker\Provider\en_US\Address( $faker ) );
      $faker->addProvider( new Faker\Provider\en_US\PhoneNumber( $faker ) );
      $faker->addProvider( new Faker\Provider\en_US\Company( $faker ) );
      $faker->addProvider( new Faker\Provider\Lorem( $faker ) );
      $faker->addProvider( new Faker\Provider\Internet( $faker ) );
      $parent = $_POST['parent'] ?? '';
      wp_insert_category( [
        'taxonomy'             => 'category',
        'cat_name'             => ucfirst( $faker->words( 4, true ) ),
        'category_description' => $faker->text( 140 ),
        'category_parent'      => $parent,
      ] );
    }
  }

  public function insertPosts( $cat_id ) {
    $images = [
      'aj-garcia-474827-unsplash.jpg',
      'alesia-kazantceva-283288-unsplash.jpg',
      'alesia-kazantceva-283291-unsplash.jpg',
      'alex-kotliarskyi-361081-unsplash.jpg',
      'alexandru-acea-582050-unsplash.jpg',
      'alvaro-reyes-500037-unsplash.jpg',
      'annie-spratt-294450-unsplash.jpg',
      'annie-spratt-439326-unsplash.jpg',
      'antenna-502693-unsplash.jpg',
      'bench-accounting-49906-unsplash.jpg',
      'bench-accounting-49908-unsplash.jpg',
      'bench-accounting-49909-unsplash.jpg',
      'benjamin-child-90768-unsplash.jpg',
      'brennan-burling-358579-unsplash.jpg',
      'brooke-cagle-609880-unsplash.jpg',
      'carl-heyerdahl-181868-unsplash.jpg',
      'charles-koh-365298-unsplash.jpg',
      'christine-donaldson-399088-unsplash.jpg',
      'christopher-burns-437750-unsplash.jpg',
      'christopher-gower-291240-unsplash.jpg',
      'christopher-gower-291246-unsplash.jpg',
      'coinview-app-796861-unsplash.jpg',
      'crew-88128-unsplash.jpg',
      'daniel-canibano-536691-unsplash.jpg',
      'devin-avery-543710-unsplash.jpg',
      'domenico-loia-272251-unsplash.jpg',
      'domenico-loia-274200-unsplash.jpg',
      'domenico-loia-298642-unsplash.jpg',
      'domenico-loia-310197-unsplash.jpg',
      'edho-pratama-149011-unsplash.jpg',
      'erik-odiin-407939-unsplash.jpg',
      'fabian-grohs-423591-unsplash.jpg',
      'fabian-grohs-530051-unsplash.jpg',
      'gabriel-beaudry-93843-unsplash.jpg',
      'gabriel-beaudry-519960-unsplash.jpg',
      'gades-photography-761358-unsplash.jpg',
      'grovemade-239357-unsplash.jpg',
      'headway-537308-unsplash.jpg',
      'helena-sollie-679150-unsplash.jpg',
      'helloquence-61189-unsplash.jpg',
      'hunters-race-408744-unsplash.jpg',
      'ionut-necula-1070249-unsplash.jpg',
      'j-kelly-brito-416262-unsplash.jpg',
      'jean-philippe-delberghe-640668-unsplash.jpg',
      'jeshoots-com-219388-unsplash.jpg',
      'john-schnobrich-520022-unsplash.jpg',
      'john-schnobrich-520023-unsplash.jpg',
      'joyce-mccown-791649-unsplash.jpg',
      'kevin-bhagat-425896-unsplash.jpg',
      'linkedin-sales-navigator-402833-unsplash.jpg',
      'luca-bravo-207676-unsplash.jpg',
      'manny-pantoja-603513-unsplash.jpg',
      'markus-spiske-352754-unsplash.jpg',
      'markus-spiske-1061339-unsplash.jpg',
      'mia-baker-322558-unsplash.jpg',
      'mia-baker-322594-unsplash.jpg',
      'nastuh-abootalebi-284883-unsplash.jpg',
      'nathan-anderson-472406-unsplash.jpg',
      'nathan-riley-514162-unsplash.jpg',
      'neonbrand-226753-unsplash.jpg',
      'nikolay-tarashchenko-614285-unsplash.jpg',
      'norbert-levajsics-183706-unsplash.jpg',
      'oli-dale-139169-unsplash.jpg',
      'patrick-perkins-350622-unsplash.jpg',
      'rawpixel-296612-unsplash.jpg',
      'rawpixel-550994-unsplash.jpg',
      'rawpixel-557123-unsplash.jpg',
      'rawpixel-580219-unsplash.jpg',
      'rawpixel-593597-unsplash.jpg',
      'rawpixel-610075-unsplash.jpg',
      'rawpixel-626045-unsplash.jpg',
      'rawpixel-632453-unsplash.jpg',
      'rawpixel-645288-unsplash.jpg',
      'rawpixel-653764-unsplash.jpg',
      'rawpixel-656720-unsplash.jpg',
      'rawpixel-675355-unsplash.jpg',
      'rawpixel-683571-unsplash.jpg',
      'rawpixel-684806-unsplash.jpg',
      'rawpixel-714362-unsplash.jpg',
      'rawpixel-741633-unsplash.jpg',
      'rawpixel-743060-unsplash.jpg',
      'rawpixel-750927-unsplash.jpg',
      'rawpixel-771300-unsplash.jpg',
      'rawpixel-782046-unsplash.jpg',
      'rawpixel-974535-unsplash.jpg',
      'rawpixel-983664-unsplash.jpg',
      'rawpixel-1054553-unsplash.jpg',
      'riccardo-pelati-637477-unsplash.jpg',
      'sabri-tuzcu-182689-unsplash.jpg',
      'samuel-zeller-106867-unsplash.jpg',
      'sarah-shaffer-729175-unsplash.jpg',
      'simon-rae-423733-unsplash.jpg',
      'slava-keyzman-388932-unsplash.jpg',
      'stefan-stefancik-257625-unsplash.jpg',
      'studio-republic-644339-unsplash.jpg',
      'tyler-franta-589346-unsplash.jpg',
      'vadim-sherbakov-68-unsplash.jpg',
      'venveo-609390-unsplash.jpg',
      'viktor-vasicsek-658565-unsplash.jpg',
      'william-iven-19843-unsplash.jpg',
    ];
    $faker  = Faker\Factory::create();
    $faker->addProvider( new Faker\Provider\Lorem( $faker ) );
    $numbers = range(0,99);
    shuffle($numbers);
    for ( $i = 0; $i < 99; $i ++ ) {
      $image_id              = array_pop($numbers);
      $post                  = array();
      $post['post_category'] = array( $cat_id );
      $post['post_status']   = 'publish';
      $post['post_type']     = 'post';
      $post['post_title']    = ucfirst( $faker->words( 10, true ) );
      $post['post_content']  = $faker->paragraphs( 10, true );
      $post_id               = wp_insert_post( $post );
      $imageUrl              = home_url( '/demo/' ) . $images[ $image_id ];
      //Featured Image
      $image_name       = basename( parse_url( $imageUrl, PHP_URL_PATH ) );
      $upload_dir       = wp_upload_dir();
      $image_data       = file_get_contents( $imageUrl );
      $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
      $file_name        = basename( $unique_file_name );
      if ( wp_mkdir_p( $upload_dir['path'] ) ) {
        $file = $upload_dir['path'] . '/' . $file_name;
      } else {
        $file = $upload_dir['basedir'] . '/' . $file_name;
      }
      file_put_contents( $file, $image_data );
      $wp_filetype = wp_check_filetype( $file_name, null );
      $attachment  = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name( $file_name ),
        'post_content'   => '',
        'post_status'    => 'inherit'
      );
      $attach_id   = wp_insert_attachment( $attachment, $file );
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
      wp_update_attachment_metadata( $attach_id, $attach_data );
      set_post_thumbnail( $post_id, $attach_id );
    }
  }
}

new Wolfost();

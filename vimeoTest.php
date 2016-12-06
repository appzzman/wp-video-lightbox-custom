<?php class VimeoThumbnail {
  public $video_url;
  public $video_id;
  public $api = "http://vimeo.com/api/v2/video/";
  public $thumbnail;
  /**
   * Set up the instance
   * @param array $config
   */
  public function __construct($id) {
    // $this->video_url = $config['video_url'];
    $this->video_id = $id;
    $this->thumbnail = $this->get_thumbnail();

  }
  /**
   * Get the thumbnail from a Vimeo ID
   * @return string
   */
  public function get_thumbnail() {
    // ----- http://stackoverflow.com/a/1361192/1291469 ----- //

    $id = $this->video_id;
    $url = "http://vimeo.com/api/v2/video/".$id.".php";
    print_r($url);
    die();

    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
    return $hash[0]['thumbnail_medium'];
  }
  /**
   * Parses the Vimeo url to get the ID of the video
   * @return int
   */
  public function get_video_id() {
    // ----- http://stackoverflow.com/a/10489007/1291469 ----- //
    $url = (int) substr(parse_url($this->video_url, PHP_URL_PATH), 1);
    return $url;
  }
}

$thumb = new VideoThumbnail("111221966")
print($thumb);
die();
?>

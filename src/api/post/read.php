<?php
//Headers
use config\Database;
use models\Post;

header('Access-Control-Allow-Origin: *'); // * full access
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//Instantiate DB & connect
$database = new Database();
$db = $database->connect();

//Instantiate object
$post = new Post($db);

//Query
$result = $post->read();

//Get row count
$num = $result->rowCount();

//Check if any posts
if($num > 0)
{
    //POST array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => $body,
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        //Push to "data"
        array_push($posts_arr['data'], $post_item);
    }

    //Turn to JSON & output
    echo json_encode($posts_arr);

}else{
    //No posts
    echo json_encode(
        array('message' => 'No Post Found')
    );
}

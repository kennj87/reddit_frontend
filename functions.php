<?php

/*
 Function to get a single query
 */

function single_query($query,$pdo) {
    $sql = $query;
    $statement = $pdo->query($sql);
    $row = $statement->fetchObject();
    $n = $row->q;
    return number_format($n);
}
/*
 Function to get reposted links for frontpage
*/

function reposted_links_front($query,$pdo){
    $sql = $query;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $i = 1;
    foreach ($result as $row) {
        echo "<tr><td>".$i."</td><td>".$row['author']."</td><td><a href='index.php?page=link&id=".$row['post_id']."'>".$row['url']."</a></td></a></td><td style='text-align:center'>".$row['repost_count']."</td>";
        $i++;
    }
}

function subreddits_posts_front($query,$pdo){
    $sql = $query;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $i = 1;
    foreach ($result as $row) {
        echo "<tr><td>".$i."</td><td>".$row['subreddit']."</td><td>".$row['most_active_user']."</td><td style='text-align:center'>".$row['posts']."</td>";
        $i++;
    }
}

/*
 Function to get a active user posts front
*/

function user_posts_front($query,$pdo){
    $sql = $query;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $i = 1;
    foreach ($result as $row) {
        echo "<tr><td>".$i."</td><td>".$row['name']."</td><td style='text-align:center'>".$row['posts']."</td>";
        $i++;
    }
}

/*
 Function to get info in the last hour
 */

function last_hour_posts($pdo) {
    $t = time() - 3600;
    return single_query("SELECT COUNT(ID) as q FROM post_info WHERE created > '$t'",$pdo);
}

function last_hour_subreddits($pdo) {
    $t = time() - 3600;
    return single_query("SELECT COUNT(ID) as q FROM subreddit WHERE created > '$t'",$pdo);
}

function last_hour_users($pdo) {
    $t = time() - 3600;
    return single_query("SELECT COUNT(ID) as q FROM users WHERE created > '$t'",$pdo);
}

function last_hour_reposts($pdo) {
    $t = time() - 3600;
    return "Something";
}

/*
 Function to get info in the last 10 min
 */

function last_10min_posts($pdo) {
    $t = time() - 600;
    return single_query("SELECT COUNT(ID) as q FROM post_info WHERE created > '$t'",$pdo);
}

function last_10min_subreddits($pdo) {
    $t = time() - 600;
    return single_query("SELECT COUNT(ID) as q FROM subreddit WHERE created > '$t'",$pdo);
}

function last_10min_users($pdo) {
    $t = time() - 600;
    return single_query("SELECT COUNT(ID) as q FROM users WHERE created > '$t'",$pdo);
}

function last_10min_reposts($pdo) {
    $t = time() - 600;
    return "Something";
}

/*
 Function to get information in the last 24 hours
 */

function last_24hour_posts($pdo) {
    $t = time() - 86400;
    return single_query("SELECT COUNT(ID) as q FROM post_info WHERE created > '$t'",$pdo);
}

function last_24hour_subreddits($pdo) {
    $t = time() - 86400;
    return single_query("SELECT COUNT(ID) as q FROM subreddit WHERE created > '$t'",$pdo);
}

function last_24hour_users($pdo) {
    $t = time() - 86400;
    return single_query("SELECT COUNT(ID) as q FROM users WHERE created > '$t'",$pdo);
}

function last_24hour_reposts($pdo) {
    $t = time() - 86400;
    return "Something";
}

/*
 Function to get link on link page
 */

function get_link_from_id($pdo,$id) {
    $sql = "SELECT url,ID from post_info WHERE ID = :ID";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':ID', $id, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetchObject();
    $url =  $row->url;
    echo "<a href='".$url."'>".$url."</a>";
}

/*
 Function to get info for link page
 */

function get_link_page_info($pdo,$id) {
    $sql = "SELECT url,ID FROM post_info WHERE ID = :ID";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':ID',$id, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetchObject();
    $url = $row->url;
    $sql_get = "SELECT author,subreddit,permalink,created from post_info where url = '$url' ORDER BY created";
    $statement = $pdo->prepare($sql_get);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $timestamp = $row['created'];
        echo "<tr><td>".gmdate("H:i:s d-m-y", $timestamp)."</td><td>".$row['author']."</td><td>".$row['subreddit']."</td><td><a href='".$row['permalink']."'>".substr($row['permalink'],0,70)."</a></td>";
    }
}
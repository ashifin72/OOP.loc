<?php
    include_once "db.php";

    function getAllMessages(){
        $query = db_query("SELECT * FROM news ORDER BY pub_date DESC");
        return $query->fetchAll();
    }

    function getOneMessage($id){
        $query = db_query("SELECT * FROM news WHERE id_news = :id", ['id' => $id]);
        return $query->fetch();
    }

    function addMessage($title, $content){
        db_query("INSERT INTO news (news_title, news_content) VALUES (:title, :content)", [
            'title' => $title,
            'content' => $content
        ]);

        $db = db_connect();
        return $db->lastInsertId();
    }

    function updateMessage($id, $title, $content){
        db_query("UPDATE news SET news_title = :title, news_content = :content WHERE id_news = :id", [
            'title' => $title,
            'content' => $content,
            'id' => $id
        ]);
        return true;
    }

    function deleteMessage($id){
        db_query("DELETE FROM news WHERE id_news = $id");
        return true;
    }
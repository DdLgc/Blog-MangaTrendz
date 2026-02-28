<?php

function getArticles(PDO $pdo, int $limit = null, int $page = 1): array
{
    $sql = "SELECT * FROM articles ORDER BY created_at DESC";

    if ($limit !== null) {
        $offset = ($page - 1) * $limit;
        $sql .= " LIMIT :offset, :limit";
    }

    $query = $pdo->prepare($sql);

    if ($limit !== null) {
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function getTotalArticle(PDO $pdo,):int
{
    $sql = "SELECT COUNT(*) as total FROM articles;";

    $query  = $pdo->prepare($sql);

    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result["total"];
}


function getArticleById(PDO $pdo, int $id):array|bool
{
    $sql = "SELECT * FROM articles WHERE id = :id";

    $query = $pdo->prepare($sql);
    
    $query->bindValue(":id", $id, PDO::PARAM_INT);


    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);

    return $article;
}

function getArticleImage(string|null $image):string
{
    if ($image === null) {
        return _ASSETS_IMAGES_FOLDER_."default-article.jpg";
    } else {
        return _ARTICLES_IMAGES_FOLDER_.htmlentities($image);
    }
}
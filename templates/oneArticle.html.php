<? include 'templates/header.html.php'; ?>

    <? foreach($this->get('articles') as $articles) { ?>
<h1><?= $articles['title']; ?></h1>
    <table>
    <tr>
        <td>Autor: <?= $articles['autor']; ?></td>
        <td>Data dodania: <?= $articles['date_add']; ?><br /></td>
    </tr>
    <tr>
        <td colspan="2"><p><?= $articles['content']; ?></p></td>
    </tr>
    <? } ?>
    </table>
<? include 'templates/footer.html.php'; ?>
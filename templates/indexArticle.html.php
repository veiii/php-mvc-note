<? include 'templates/header.html.php'; ?>

    <h1>Lista notatek</h1>
    <table cellspacing="1" class="tablesorter">
    <thead>
        <tr>
            <td>Tytuł</td>
            <td>Data dodania</td>
            <td>Autor</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
        <? foreach($this->get('articles') as $articles) { ?>
    <tbody>
            <tr>
                <td><a href="?task=articles&amp;action=one&amp;id=<?= $articles['id']; ?>"><?= $articles['title']; ?></a></td>
                <td><?= $articles['date_add']; ?></td>
                <td><?= $articles['autor']; ?></td>
                <td><a href="?task=articles&amp;action=delete&amp;id=<?= $articles['id']; ?>">usuń</a></td>
            </tr>
    </tbody>
        <? } ?>
    </table>

    <script>
    $(document).ready(function()
    {
    $("table").tablesorter();
    }
    );
    </script>

<? include 'templates/footer.html.php'; ?>
<? include 'templates/header.html.php'; ?>

<h1>Dodaj notatke </h1>
<form action="?task=articles&amp;action=insert" method="post">
    <table id="dodawanie">
        <tr>
            <td>Autor:</td>
            <td><input type="text" name="autor" value= "<? echo $_SESSION['user_name'];?>" readonly><br /></td>
        </tr>
        <tr>
            <td>Data dodania:</td>
            <td><input type="text" name="date_add" value="<?= date("Y:m:d,H:i"); ?>" readonly ><br /></td>
        </tr>
        <tr>
            <td>Tytuł:</td>
            <td><input type="text" name="title" required/><br /></td>
        </tr>
        <tr>
            <td>Treść:</td>
            <td><textarea name="content"></textarea><br /></td>
        </tr>
    <br />
    </table>
    <button id="dodajNot" type="submit" value="Dodaj" />Dodaj</button>
</form>

<? include 'templates/footer.html.php'; ?>
<?php
namespace tvshows;
class Episode
{
    public function ajoutSerie($name, $imgFile = null)
    {

        $name = htmlspecialchars($name);

        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::UPLOAD_DIR;
            if (!is_dir($dirname))
                mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded)
                die("FILE NOT UPLOADED");
        } else
            echo "NO IMAGE !!!!";

        $query = ''; //requette pour ajouter une serie 
        $params = [
            'name' => htmlspecialchars($name),
            //+ les autres paramettres 

        ];
        return $this->exec($query, $params);
    }

    function generateSeries()
    {
        if ($this->file == null) {
            for ($i = 0; $i < 20; $i++): ?>
                <div id="image-serie">
                    <img src="" alt="imageSerie">
                    <legend style="justify-content: center;">
                        <label>Serie</label>
                    </legend>
                </div>


            <?php endfor;

        } else {
            $data = json_decode($this->file);


            foreach ($data as $card): ?>
                <div id="image-serie">
                    <img src="<?php ?>" alt="image">
                    <legend style="justify-content: center;">
                        <label for="<?php ?>"><?php ?></label>
                    </legend>
                </div>


            <?php endforeach; ?>
        <?php }


    }




}


?>
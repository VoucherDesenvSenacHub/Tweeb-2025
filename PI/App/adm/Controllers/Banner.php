
<?php
require_once __DIR__ . '/../../DB/Database.php';



class Banner{

    public int $id_banner;
    public string $caminho;
    public int $posicao;



    public function getBannerForPosicao($tabela, $posicao) {
        $db = new Database($tabela);
        $result = $db->select_banner("posicao = $posicao");

        return $result->fetchObject(self::class);
    }

    public function cadastrarBannersPrincipais() {
        $db = new Database('banners_principais');
        $result = $db->insert_banner([
            'caminho' => $this->caminho,
            'posicao' => $this->posicao
        ]);
        return $result ? true : false;
    }

    public function updateBannersPrincipais() {
        $db = new Database('banners_principais');
        return $db->update_banner(
            'posicao = ' . $this->posicao,
            ['caminho' => $this->caminho]
        );
    }

   public function cadastrarBannersSecundarios() {
    $db = new Database('banners_secundarios');
    $result = $db->insert_banner([
        'caminho' => $this->caminho,
        'posicao' => $this->posicao
    ]);
    return $result ? true : false;
}
    public function updateBannersSecundarios() {
        $db = new Database('banners_secundarios');
        return $db->update_banner(
            'posicao = ' . $this->posicao,
            ['caminho' => $this->caminho]
        );
    }

   public function cadastrarBannersPromocionais() {
    $db = new Database('banners_promocionais');
    $result = $db->insert_banner([
        'caminho' => $this->caminho,
        'posicao' => $this->posicao
    ]);
    return $result ? true : false;
}


    public function updateBannersPromocionais() {
        $db = new Database('banners_promocionais');
        return $db->update_banner(
            'posicao = ' . $this->posicao,
            ['caminho' => $this->caminho]
        );
    }

    public function cadastrarBannersMobile() {
        $db = new Database('banners_mobile');
        $result = $db->insert_banner(['caminho' => $this->caminho]);
        return $result ? true : false;
    }

    public function updateBannersMobile() {
        $db = new Database('banners_mobile');
        return $db->update_banner(
            'posicao = ' . $this->posicao,
            ['caminho' => $this->caminho]
        );
    }

   public function cadastrarBannersSobreMim() {
    $db = new Database('sobre_mim');
    $result = $db->insert_banner([
        'caminho' => $this->caminho,
        'posicao' => $this->posicao
    ]);
    return $result ? true : false;
}

    public function updateBannersSobreMim() {
        $db = new Database('sobre_mim');
        return $db->update_banner(
            'posicao = ' . $this->posicao,
            ['caminho' => $this->caminho]
        );
    }
}



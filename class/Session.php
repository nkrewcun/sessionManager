<?php


class Session
{

    public $session = [];

    /**
     * Fonction pour ajouter un élément à la session
     * @param $name string Le nom de l'élément à ajouter
     * @param $value mixed valeur de l'élément à ajouter
     */
    public function __set($name, $value)
    {
        $this->session[$name] = $value;
    }

    /**
     * Fonction qui retourne la valeur d'un élément de la session ou null s'il n'existe pas
     * @param $name string Le nom de l'élément à retourner
     * @return mixed|null La valeur retournée ou null si l'élément n'existe pas
     */
    public function __get($name)
    {

        return $this->__isset($name) ? $this->session[$name] : null;
    }

    /**
     * Fonction qui vérifie si un élément est bien existant dans la session
     * @param $name string Le nom de l'élément à vérifier
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->session[$name]);
    }

    /**
     * Fonction qui permet de supprimer un élément de la session
     * @param $name string Le nom de l'élément à supprimer
     */
    public function __unset($name)
    {
        unset($this->session[$name]);
    }

    /**
     * Constructeur de la session
     */
    public function __construct()
    {
        session_start();
        foreach ($_SESSION as $key => $value) {
            $this->session[$key] = unserialize($value);
        }
    }

    public function save() {
        foreach ($this->session as $key => $value) {
            $_SESSION[$key] = serialize($value);
        }
    }

    /**
     * Fermeture de la session
     */
    public function destruct()
    {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
            $this->__unset($key);
        }
    }

}

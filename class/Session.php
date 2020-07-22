<?php


class Session
{

    public $session = [];

    /**
     * Fonction pour ajouter un élément au tableau $session
     * @param $name string Le nom de l'élément à ajouter
     * @param $value mixed valeur de l'élément à ajouter
     */
    public function __set($name, $value)
    {
        $this->session[$name] = $value;
    }

    /**
     * Fonction qui retourne la valeur d'un élément du tableau $session ou null s'il n'existe pas
     * @param $name string Le nom de l'élément à retourner
     * @return mixed|null La valeur retournée ou null si l'élément n'existe pas
     */
    public function __get($name)
    {

        return $this->__isset($name) ? $this->session[$name] : null;
    }

    /**
     * Fonction qui vérifie si un élément est bien existant dans le tableau $session
     * @param $name string Le nom de l'élément à vérifier
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->session[$name]);
    }

    /**
     * Fonction qui permet de supprimer un élément du tableau $session
     * @param $name string Le nom de l'élément à supprimer
     */
    public function __unset($name)
    {
        unset($this->session[$name]);
    }

    /**
     * Constructeur de la session en récupérant tous les éléments existants dans $_SESSION
     */
    public function __construct()
    {
        session_start();
        foreach ($_SESSION as $key => $value) {
            $this->session[$key] = unserialize($value);
        }
    }

    /**
     * Fonction pour sauvegarder notre tableau $session dans $_SESSION
     */
    public function save() {
        foreach ($this->session as $key => $value) {
            $_SESSION[$key] = serialize($value);
        }
    }

    /**
     * On supprime tous les éléments du tableau $session et de $_SESSION
     */
    public function destruct()
    {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
            $this->__unset($key);
        }
    }

}

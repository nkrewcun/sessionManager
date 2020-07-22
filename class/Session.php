<?php


class Session
{

    /**
     * Fonction pour ajouter un élément à la session
     * @param $name Le nom de l'élément à ajouter
     * @param $value La valeur de l'élément à ajouter
     */
    public function __set($name, $value)
    {
        $_SESSION[$name] = serialize($value);
    }

    /**
     * Fonction qui retourne la valeur d'un élément de la session ou null s'il n'existe pas
     * @param $name Le nom de l'élément à retourner
     * @return mixed|null La valeur retournée ou null si l'élément n'existe pas
     */
    public function __get($name)
    {
        return $this->__isset($name) ? unserialize($_SESSION[$name]) : null;
    }

    /**
     * Fonction qui vérifie si un élément est bien existant dans la session
     * @param $name Le nom de l'élément à vérifier
     * @return bool
     */
    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Fonction qui permet de supprimer un élément de la session
     * @param $name Le nom de l'élément à supprimer
     */
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * Constructeur de la session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Fermeture de la session
     */
    public function destruct()
    {
        session_destroy();
    }

}

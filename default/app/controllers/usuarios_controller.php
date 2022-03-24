<?php
Load::models('usuarios');
class UsuariosController extends AppController{
    public function index($nombres = ''){
        View::template('principal');
        $this->listUsuarios = (new Usuarios)->getUsuarios($page = 1);
    }
    public function registro(){
        view::template('principal');
    }
    public function guardar(){
        if (Input::haspost('usuarios')) {
            $usuario = new Usuarios(input::post('usuarios'));
            if ($usuario->create()) {
                Flash::valid('Operacion exitosa');
                Input::delete();
                return Redirect::to();
            } else {
                flash::error('fallo el guardado');
            }
        }
    }
    public function borrar($id){
        view::select(null);
    }
    public function editar($id){
        view::template('principal');
    }
}

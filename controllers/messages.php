<?php
class Messages extends Controller{
    function index(){
        $this->redirect("messages/inbox");
    }
    
    function inbox(){
        $this->rows = $this->Messages->find('all');
    }

    function delete($id){
        $this->Messages->remove($id);
        $this->redirect("messages");
        $this->alert("Nachricht gelöscht", "success");
    }


    public function pre() {
        
    }
}

?>

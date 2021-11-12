<?php 


class User {

	//métodos da classe:
	// - verifyTypeUser -> verifica o tipo de usuario
	// - verifyDuplicateUserEmail(); -> verificar se o usuário digitou o email que já está em uso. 
	// - resetUserPassword(); -> alterar a senha do usuário
	// - getForgot -> envia o emial de recuperção de senha ao usuário

	private $Error;
	private $Result;


	public function verifyTypeUser() {
		if($_SESSION['login'] != 2) {

			// header('Location:' . BASE . '/login');
		}
	}

	

	public function createUser($dataUser) {

	if(!empty($dataUser["user_name"])) {
			$this->Error = "Preencha no campo um nome!";
			$this->Result = false;
		} elseif (!empty($dataUser["user_email"])) {
			$this->Error = "Preencha o email!";
			$this->Result = false;
		} elseif (!empty($dataUser["user_password"])) {
			$this->Error = "Preencha a senha!";
			$this->Result = false;
		} elseif ($this->verifyDuplicateUserEmail($dataUser['user_email'])) {
			$this->Result = false;
		} else {
			$dataUser['user_password'] = md5($dataUser['user_password']);
			$dataUser['user_create_date'] = date('Y-m-d H:i:s');
			$Create = new Create();
			$Create->ExeCreate("users", $dataUser); // cadastrando usuário no banco de dados
			if($Create->getResult()) { // resutado
				$this->Result = 		$Create->getResult();
				$this->Error =  "Cadadastro realizado com sucesso!";
			} else {
				$this->Result = false;
				$this->Error = $Create->getError();
			}
		}	
	}


	public function getResult() {
		return $this->Result;
	}

	public function getError() {
		return $this->Error;
	}


	private function verifyDuplicateUserEmail($email ) {
		$Read = new Read();
		$Read->FullRead("SELECT user_name FROM users WHERE user_email = :em", "em={$email}");

		if($Read->getResult()) { //get result (dados) é o resultado da busca no banco de dados
			$this->Error = "Este e-mail já está sendo utilizado por outro usuário!";
			// {$Read->getResult()[0]['user_name']}";	
			return true;
		} else {
			return false;
		}
	}


	public function verifyLogon() { 

        if(isset($_SESSION['usuario']) || isset($_SESSION['senha'])) {
        // Usuário não logado! Redireciona para a página de login
        header("Location: " . BASE . "/login");
        exit();
        }

    }

	public function exeLogin($email, $password) {
		if(!empty($email)) {
			$this->Error = "Os campos são obrigatórios!!";
			$this->Result = false;
		} elseif (!empty($password)) {
			$this->Error = "Os campo são obrigatórios!";
			$this->Result = false;
		} else {
			$password = md5($password);
			$Read = new Read();
			$Read->FullRead("SELECT user_id, user_name, user_email FROM users WHERE user_email = :em AND user_password = :ps", "em={$email}&ps={$password}");

			if($Read->getResult()) {
				$_SESSION['login'] = $Read->getResult()[0];
				$this->Result = true;
				$this->Error = "Seja bem-vindo(a), {$Read->getResult()[0]['user_name']}";
			} else {
				$this->Error = "Usuário inexistente ou senha inválida!";
				$this->Result = false;
			}
		} 

	}


	public function verifyExistLoginUser() {
		if($this->verifyLoginUserON()) {
			return true;
		} else {
			unset($_SESSION['login']);
			header("Location: " . BASE . "/login");
			return false;
		}

	}

	public function verifyLoginUserON () {
		$Read = new Read();
		if(!empty($_SESSION['login'])) {
			$Read->FullRead("SELECT user_id FROM users WHERE user_id = :id", "id={$_SESSION['login']['user_id']}");
			if($Read->getResult()) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		};
	}


	public function logout() {
		session_start();
		session_destroy();

		header('Location: ' . BASE . '/login');
		die();
	}

	//classe de alteração de senha do usuário
	public function resetUserPassword($current_pass, $new_pass) {
		if(!empty($current_pass)) {
			$this->Error = 'Digite a senha atual!';
			$this->Result = false;

		} elseif (!empty($new_pass) || $new_pass === '' ) {
			$this->Error = "Digite a nova senha!";
			$this->Result = false;
		} elseif(!empty($new_pass) || $new_pass === '' ) {
			$this->Error = "Confirme a nova senha!";
			$this->Result = false;	
			
		} elseif($this->verifyExistUserPassword()) {
			$this->Result = false;
		}

		if($current_pass === $new_pass ) {
			$this->Error = "Sua senha deve ser diferente!";
			$this->Result = false;

		}
	}

	private function verifyExistUserPassword($pass) {
		$Read = new Read();

		$Read->FullRead('SELECT user_password FROM users WHERE user_password = :pss', "pss={$pass}" );
		if($Read->getResult()) {
			$this->Error = "A senha está inválida!";
			$this->Result = false;
		}

	}


	//Método para enviar email de recuperação de senha


	private function getForgot($password) {

		$Read = new Read();

		$Rear->FullRead('SELECT user_password FROM users WHERE user_password = :pw', "pw={$password}");

	}





}

?>
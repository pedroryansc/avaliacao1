<?php
    class PessoaFisica{
        private $id;
        private $cpf;
        private $nome;
        private $dataNascimento;
        public function __construct($cpfDoc, $nm, $dtNascimento){
            $this->setCPF($cpfDoc);
            $this->setNome($nm);
            $this->setDataNascimento($dtNascimento);
        }
        
        public function inserirPessoaFisica(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("INSERT INTO pessoa_fisica (pf_cpf, pf_nome, pf_dt_nascimento) VALUES(:pf_cpf, :pf_nome, :pf_dt_nascimento)");
            $stmt->bindParam(":pf_cpf", $this->getCPF(), PDO::PARAM_STR);
            $stmt->bindParam(":pf_nome", $this->getNome(), PDO::PARAM_STR);
            $stmt->bindParam(":pf_dt_nascimento", $this->getDataNascimento(), PDO::PARAM_STR);
            return $stmt->execute();
        }
        public function alterarPessoaFisica($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE pessoa_fisica SET pf_cpf = :pf_cpf, pf_nome = :pf_nome, pf_dt_nascimento = :pf_dt_nascimento WHERE pf_id = $id");
            $stmt->bindParam(":pf_cpf", $this->getCPF(), PDO::PARAM_STR);
            $stmt->bindParam(":pf_nome", $this->getNome(), PDO::PARAM_STR);
            $stmt->bindParam(":pf_dt_nascimento", $this->getDataNascimento(), PDO::PARAM_STR);
            return $stmt->execute();
        }
        public function excluirPessoaFisica($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("DELETE from pessoa_fisica WHERE pf_id = $id");
            return $stmt->execute();
        }

        public function getCPF(){
            return $this->cpf;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getDataNascimento(){
            return $this->dataNascimento;
        }
        
        public function setCPF($newCPF){
            $this->cpf = $newCPF;
        }
        public function setNome($newNome){
            $this->nome = $newNome;
        }
        public function setDataNascimento($newDataNascimento){
            $this->dataNascimento = $newDataNascimento;
        }
    }
?>
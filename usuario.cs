using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tcc
{
    #region Usuario
    public class Usuario
    {
        #region Member Variables
        protected int _codigo;
        protected string _nome;
        protected string _email;
        protected string _telefone;
        protected string _senha;
        #endregion
        #region Constructors
        public Usuario() { }
        public Usuario(string nome, string email, string telefone, string senha)
        {
            this._nome=nome;
            this._email=email;
            this._telefone=telefone;
            this._senha=senha;
        }
        #endregion
        #region Public Properties
        public virtual int Codigo
        {
            get {return _codigo;}
            set {_codigo=value;}
        }
        public virtual string Nome
        {
            get {return _nome;}
            set {_nome=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Telefone
        {
            get {return _telefone;}
            set {_telefone=value;}
        }
        public virtual string Senha
        {
            get {return _senha;}
            set {_senha=value;}
        }
        #endregion
    }
    #endregion
}
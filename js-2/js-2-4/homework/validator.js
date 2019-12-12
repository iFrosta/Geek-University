class Validator {
  constructor(form) {
    this.patterns = {
      name: /^[a-zа-яё]+$/i,
      phone: /^\+7\(\d{3}\)\d{3}-\d{4}$/,
      email: /^[\w._-]+@\w+\.[a-z]{2,4}$/i
    };
    this.errors = {
      name: 'Имя должно содержать только буквы',
      phone: 'Телефон должен быть написан в международном формате',
      email: 'Неправильно введен email',
    };
    this.form = form;
    this.logBlock = 'log';
    this.valid = false;
    this._init();
  }

  _init() {
    let form = document.getElementById(this.form);
    let errors = [...form.querySelectorAll(`.${this.logBlock}`)];
    for (let error of errors) {
      error.remove();
    }
    let fields = [...form.getElementsByTagName('input')];
    for (let field of fields) {
      this._validate(field);
    }
    if(![...form.querySelectorAll('.invalid')].length){
      this.valid = true;
    }
  }

  _validate(field) {
    if (this.patterns[field.name]) {
      if (!this.patterns[field.name].test(field.value)) {
        field.classList.add('invalid');
        this._addErrorMsg(field);
        this._watchField(field);
      }
    }
  }

  _addErrorMsg(field) {
    let error = `<div class="${this.logBlock}">${this.errors[field.name]}</div>`;
    field.parentNode.insertAdjacentHTML('beforeend', error);
  }

  _watchField(field) {
    field.addEventListener('input', () => {
      let error = field.parentNode.querySelector(`.${this.logBlock}`);
      if (!this.patterns[field.name].test(field.value)) {
        field.classList.remove('invalid');
        field.classList.add('valid');
        if (error) {
          error.remove();
        }
      } else {
        field.classList.remove('valid');
        field.classList.add('invalid');
        if (!error) {
          this._addErrorMsg(field);
        }
      }
    })
  }
}
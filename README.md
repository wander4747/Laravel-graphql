# Laravel com Graphql - School of net

## 💻 Projeto

 Fundamentos do GraphQL e como implementar uma API neste formato no Laravel

- [Link do curso](https://www.schoolofnet.com/curso/php/laravel/graphql-com-laravel/)


## 🧑‍💻 Exemplos de consultas!

```sh
{
  #users(id:1) {
  #  name
  #}
  
  users(paginate:1, page: 1){
    id
    name
    email
    posts{
      id title
    }
  }
  users_paginated(paginate:1, page:1) {
    data{
      id name
      posts{
      id title
    }
    }
  }
  posts{
    data {
      id title
    }
  }
}

mutation insertPost{
  createPost(title: "post mutation", active: true, user_id:1) {
    id
  }
}
```

## Contatos

[![Github Badge](https://img.shields.io/badge/-Github-000?style=flat-square&logo=Github&logoColor=white&link=https://github.com/wander4747)](https://github.com/wander4747)
[![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/wander-douglas/)](https://www.linkedin.com/in/wander-douglas/)
[![Whatsapp Badge](https://img.shields.io/badge/-Whatsapp-4CA143?style=flat-square&labelColor=4CA143&logo=whatsapp&logoColor=white&link=https://api.whatsapp.com/send?phone=5531993326096&text=Hello!)](https://api.whatsapp.com/send?phone=5531993326096&text=Hello!)
[![Gmail Badge](https://img.shields.io/badge/-Gmail-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:wander.douglas14@gmail.com)](mailto:wander.douglas14@gmail.com)

Feito com muito ❤️☕👨🏻‍💻 por Wander Douglas
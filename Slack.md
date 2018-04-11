### Por que criar um bot pro slack?

Bots são assistentes programáveis. Isso quer dizer que você pode criar um bot para te ajudar a resolver problemas que você encontre. 

Não sabe se sua agenda está livre? Seu time é distribuído através do mundo e você não lembra o fuso-horário? Sempre esquece aquele link que você só precisa usar uma vez por semana? 

Checar se o seu site está offline pra todo mundo ou se só para você?

Todas essas situações podem ser resolvidas por alguém que esteja disponível 24 horas por dia, todos os dias da semana. Afinal, não sabemos quando iremos precisar dessas informações e quando precisarmos, não gostaríamos de esperar muito para saber as respostas. É aí que nosso bot entra! 

Ele não dorme, não come, não precisa de intervalos e está sempre disponível para lhe dar as informações que ele souber!

Vamos aprender como fazer esse assistente mágico!


#### Criando o bot no Slack

Para poder criar um bot, precisamos de mais um passo: avisar ao Slack que estamos criando um! Para que o bot seja capaz de “ler” mensagens e responder, ele precisa de um  _token_, que é uma permissão que o Slack concede para que você crie seu próprio bot.
Esse token fica associado com a sua conta, então é necessário ter muito cuidado para não compartilhar esse token com ninguém.

### Criando nosso bot
Antes de escrevermos qualquer código, precisamos configurar o nosso bot do Slack dentro da nossa equipe do Slack. Vá até *https://[yourslackteam].slack.com/apps/build/custom-integration* integração personalizada e clique em “Bots”.
  
![](https://www.twilio.com/blog/wp-content/uploads/2017/02/SuUYUoDfy60pGc5bE-C6WPS5A6ob-lpDhSTTnTc4ngp-fmMMZ9ezBErw88iM8En466SVled_DYd-ixzlWGr7U1m0kGH3-dEm1u-5t8h6NK0HRQywVtlBSvuxLrSfCuulx7Q8_wYh.png)

Dê ao seu bot um nome inteligente. Ou, se você não tiver inspiração, sinta-se à vontade para usar algo simples como "php_bot" e clique em "Adicionar integração".

![](https://www.twilio.com/blog/wp-content/uploads/2017/02/pq1aXzKShVuuaTlxcjGa1ibQQJEPqk_6Bhsz7Oi3ZYdRadpfYrWYno9zfFsbxhiWGM9YNw8tG_yCL9vT048yCDbtFfvWU5npW4aG9Uuo-luYjt4PrCzEVfu0F6ZppI_jXg6ypOjY.png)

A próxima página fornecerá um token de API que você deseja manter à mão. Nós vamos fazer uso dele em breve.
https://medium.com/@gpiress/criando-um-bot-no-slack-dd1895cc6422#.cbs9hpql0

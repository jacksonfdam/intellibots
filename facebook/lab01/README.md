# Intellibots
## Facebook
### Lab 01

**Documentação:**
[https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received](https://developers.facebook.com/docs/messenger-platform/webhook-reference/message-received) 

**Não Esquecer**
Defina a constante `BOT_TOKEN` com o token obtido pela sua App com a Página.
A constante `VERIFY_TOKEN`deve ser identica na definição do  webhook.


**Ações do Bot:**
 - ***[data|hora|agora]***  responde: São `$H`:`$i`   de `$nomediadasemana`, `$dia` de `$nomemes` de `$ano`
 - ***tempo em \$cidade***  responde:  Hoje a condição em `$cidade['name']` é de `$cidade['weather'][0]['description']`, com temperatura de `$cidade ['main']['temp']` com miníma de `$cidade ['main']['temp_min']` e máxima de `$cidade ['main']['temp_max']` 

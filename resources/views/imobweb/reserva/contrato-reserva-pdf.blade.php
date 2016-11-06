<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contrato de Reserva</title>


    <link href="{{url('assets/imobweb/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div align="center">
    <table class="ContTable" style="width: 484.5pt;" border="0"
           cellpadding="0" cellspacing="0" width="646">
        <tbody>
        <tr style="">
            <td style="padding: 0cm;">
                <p class="Cont" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center">
                    <b>
                        <u>
                                                        <span style="font-size: 10pt; font-family:quot, Verdana, sans-serif;">
                                                            CONTRATO DE RESERVA DE IMÓVEL
                                                        </span>
                        </u>
                    </b>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 0cm;" valign="top">
                <p class="Cont" style="line-height: normal; margin-top: 20px;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DAS PARTES CONTRATANTES</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 1ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Firmam o presente contrato particular de promessa de reserva da unidade imobiliária:</span>
                </p>

                {{--Tabela de dados da imobiliária--}}
                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Dados Imobiliária:</span></b>

                <table class="ContTable" style="width: 484.5pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    @foreach($imobiliarias as $imobiliaria)
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Razão Social: {{$imobiliaria->razao_social}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CNPJ: {{$imobiliaria->cnpj}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Endereço: {{$imobiliaria->rua}}, {{$imobiliaria->numero}} - {{$imobiliaria->cidade}}, {{$imobiliaria->uf}}</td>
                        </tr>
                    @endforeach
                </table>
                </p>

                {{--Tabela de dados do vendedor--}}
                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Dados Promitente Vendedor:</span></b>

                <table class="ContTable" style="width: 484.5pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    @foreach($vendedores as $vendedor)
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Nome: {{$vendedor->nome_razao}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Data Nascimento: {{ date('d/m/Y', strtotime($vendedor->data_nascimento)) }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CPF: {{$vendedor->cpf_cnpj}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">RG: {{$vendedor->rg}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CEP: {{$vendedor->cep}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Endereço: {{$vendedor->rua}}, {{$vendedor->numero}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Bairro: {{$vendedor->bairro}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cidade/Estado: {{$vendedor->cidade}}, {{$vendedor->uf}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Telefone: {{$vendedor->telefone}}</td>
                        </tr>
                    @endforeach
                </table>
                </p>

                {{--Tabela de dados do comprador--}}
                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Dados Promitente Comprador:</span></b>

                <table class="ContTable" style="width: 484.5pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    @foreach($compradores as $comprador)
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Nome: {{$comprador->nome_razao}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Data Nascimento: {{ date('d/m/Y', strtotime($comprador->data_nascimento)) }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CPF: {{$comprador->cpf_cnpj}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">RG: {{$comprador->rg}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CEP: {{$comprador->cep}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Endereço: {{$comprador->rua}}, {{$comprador->numero}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Bairro: {{$comprador->bairro}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cidade/Estado: {{$comprador->cidade}}, {{$comprador->uf}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Telefone: {{$comprador->telefone}}</td>
                        </tr>
                    @endforeach
                </table>
                </p>

                {{--Tabela de dados do corretor--}}
                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Dados do Corretor:</span></b>

                <table class="ContTable" style="width: 484.5pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    @foreach($corretores as $corretor)
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Nome: {{$corretor->nome_razao}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CPF: {{$corretor->cpf_cnpj}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CRECI: {{$corretor->creci}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Telefone: {{$corretor->telefone}}</td>
                        </tr>
                    @endforeach
                </table>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DO OBJETO</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 2ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">É objeto do presente contrato particular de promessa de compra e venda,
                                                    a unidade imobiliária descrita abaixo, doravante designada apenas UNIDADE IMOBILIÁRIA:</span>

                <table class="ContTable" style="width: 484.5pt;" border="1" cellpadding="0" cellspacing="0" width="646">
                    @foreach($imoveis as $imovel)
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cod.: {{$imovel->codigo}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Tipo de Imóvel: {{$imovel->tipo}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Endereço: {{$imovel->rua}}, {{$imovel->numero}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">CEP: {{$imovel->cep}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Bairro: {{$imovel->bairro}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cidade: {{$imovel->cidade}}</td>
                        </tr>
                        <tr>
                            <td style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Estado: {{$imovel->uf}}</td>
                        </tr>
                    @endforeach
                </table>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 3ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Pelo presente contrato, o VENDEDOR promete vender e COMPRADOR promete comprar
                                                    a UNIDADE IMOBILIÁRIA, na forma das cláusulas e condições aqui estabelecidas.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DO PREÇO E DA FORMA DE PAGAMENTO </span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 4ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Pela UNIDADE IMOBILIÁRIA, o COMPRADOR pagará ao VENDEDOR o preço total de R$ @foreach($imoveis as $imovel){{$imovel->valor}}@endforeach.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 5ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O preço da UNIDADE IMOBILIÁRIA será pago de acordo como combinado na folha anexo.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DAS OBRIGAÇÕES DAS PARTES</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 6ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">São obrigações do VENDEDOR, dentre outras constantes deste contrato: <br>
                                                a) entregar a unidade prometida no prazo previsto e de acordo com as especificações constantes do memorial de incorporação, ressalvados os atrasos justificados e alterações necessárias;<br>
                                                b) reparar, de acordo com a legislação em vigor e em atenção ao Código Civil e ao Código de Defesa do Consumidor, os vícios e defeitos que forem constatados;<br>
                                                c) entregar a unidade com instalações elétricas e hidráulicas em condições de ligação às redes de água e energia.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 7ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">São obrigações do COMPRADOR, dentre outras constantes deste contrato: <br>
                                                a) pagar pontualmente o preço e outros débitos que forem devidos em favor do VENDEDOR ou do Agente Financeiro, se o caso, no local por ela designado;<br>
                                                b) comunicar ao VENDEDOR imediatamente e por escrito, qualquer alteração de seu endereço, com respectivos telefones e demais meios de contato, sob pena de ser considerado como válido o endereço indicado no preâmbulo deste contrato,
                                                    assim como, considerados recebidos os comunicados, notificações, intimações e assemelhados que forem para lá encaminhados, mesmo após a entrega das chaves da UNIDADE IMOBILIÁRIA ora prometida;<br>
                                                c) optando por financiamento bancário, tomar as providências, realizar as diligências e providenciar toda a documentação necessária e pagamento de taxas e valores relativos à documentação que lhe(s) couber(em),
                                                    no prazo de 2 (dois) dias úteis, para que se dê, em até 15 (quinze) dias contados do recebimento da documentação, a aprovação do financiamento e, no prazo previsto, a sua efetivação junto ao agente financeiro e a assinatura da respectiva escritura de repasse;<br>
                                                d) responsabilizar-se integralmente, quando da entrega da unidade imobiliária, pela solicitação, junto às respectivas concessionárias de serviços públicos de ligação das unidades consumidoras de água e energia à rede, para início de fornecimento, pagando a respectiva taxa;</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 8ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Esclarece-se que compete ao COMPRADOR  fornecer toda a documentação necessária à pronta aprovação do financiamento, assim como,
                                                    manter-se em condições para tanto, no que concerne à comprometimento de renda, regularidade de crédito e demais exigências da instituição financeira,
                                                    ficando desde já consignado que, ainda que o crédito não seja negado pela instituição financeira, mas que sejam feitas novas exigências que mantenham o contrato em análise e
                                                    impeçam a aprovação do financiamento do prazo de 15 (quinze) dias corridos contados da entrega da documentação.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 9ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Até a assinatura do contrato junto ao agente financeiro,
                                                    correrão por conta exclusiva do VENDEDOR todas as despesas e encargos fiscais incidentes sobre o imóvel,
                                                    exceto a taxa de ligação de água e energia do condomínio que, por ocasião da entrega das chaves, e como condição dela,
                                                    deverão ser reembolsadas pelo COMPRADOR. A partir da assinatura do contrato com o agente financeiro,
                                                    correrão por conta exclusiva do COMPRADOR todas as despesas e encargos fiscais incidentes sobre o imóvel.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DO FINANCIAMENTO</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 10ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">No caso do VENDEDOR, para o fim do financiamento, atendendo a solicitação do  COMPRADOR,
                                                    fornecer dados ou firmar documentos para o Agente Financiador, serão eles entendidos como de simples cumprimento de formalidades.
                                                    Restarão sempre válidas e exigíveis, sem qualquer modificação, as estipulações deste contrato particular,
                                                    mesmo no caso de os dados e documentos fornecidos ou assinados, colidirem com elas, pois se destinam ao cumprimento de formalidades burocráticas.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Parágrafo Unico: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O VENDEDOR, para o fim de aprovação do financiamento, poderá declarar no contrato junto ao Agente Financeiro,
                                                    que foi quitada a parcela relativa aos RECURSOS PRÓPRIOS, PARCELA FINAL e OUTRAS (cláusula 6ª, alínea ‘d’, ‘e’ e ‘f’). Se, por liberalidade,
                                                    o VENDEDOR parcelar o pagamento a ser realizado com RECURSOS PRÓPRIOS, PARCELA FINAL e OUTROS eventual declaração de quitação no contrato junto ao
                                                    Agente Financeiro não terá efeito ou validade até que sejam quitadas e resgatadas todas as promissórias descritas na cláusula 6ª, alínea ‘d’ e respectivo reajuste,
                                                    prevalecendo, especialmente, neste caso, o disposto neste instrumento, na forma do caput.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 11ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Nos casos em que o COMPRADOR optar pelo pagamento de parte do saldo devedor
                                                    através de financiamento e/ou saque do FGTS, a unidade será entregue ao COMPRADOR somente após a liberação do crédito o
                                                    VENDEDOR que ocorrerá após o registro em cartório do documento firmado para liberação do financiamento e/ou saque do FGTS,
                                                    do acerto de diferenças apuradas e mediante a disponibilidade dos recursos decorrentes do financiamento, em conta corrente do VENDEDOR.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">RESCISÃO DO CONTRATO</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 12ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">É vedado ao COMPRADOR transferir os direitos relativos ao imóvel sem a expressa anuência do VENDEDOR,
                                                    sob pena de absoluta invalidade da transferência, perante o VENDEDOR, permanecendo exigíveis e válidos,
                                                    todos os deveres e obrigações, perante o COMPRADOR, que permanecer responsável, será o único detentor  dos direitos e ainda,
                                                    terá que arcar com multa equivalente a 10% (dez por cento) do preço, a título de cláusula penal por descumprimento contratual.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 13ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Caso a negociação não se efetive por conta exclusiva das partes,
                                                    a parte que der causa a rescisão, pagará a parte inocente, o importe de 10% (dez por cento), sobre o valor da venda.
                                                    Na hipótese da não efetivação, por motivos alheios à vontade das partes, nenhuma multa será cobrada. Sendo responsabilidade
                                                    do COMPRADOR a obtenção de financiamento bancário, assim como, adequação aos requisitos, critérios e condições necessárias à aprovação,
                                                    o que deverão apurar antes da assinatura deste contrato, se a efetivação do negócio não ocorrer pela impossibilidade de
                                                    aprovação de crédito ou obtenção de financiamento bancário para quitação do preço da unidade adquirida, o COMPRADOR deverá pagar
                                                    ao VENDEDOR o equivalente a R$ 2.000,00 (dois mil reais) para cobertura das despesas administrativas.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">NORMAS DE MANUTENÇÃO PELO COMPRADOR E RESPONSABILIDADE DO VENDEDOR</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 14ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O COMPRADOR obriga-se a zelar, conservar e manter a unidade e o prédio,
                                                    mesmo após receber a posse e o domínio da unidade, realizando manutenção preventiva na forma da NBR 5674,
                                                    promovendo o necessário, estando ciente que responderá pelas omissões, excessos ou danos que causar à unidade.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 15ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O VENDEDOR assume integral responsabilidade por defeitos aparentes ou ocultos,
                                                    bem como, pela solidez e segurança da unidade imobiliária, do Código de Defesa do Consumidor e do Código Civil,
                                                    desde que COMPRADOR não concorram para o seu comprometimento, ficando expressamente excluída a responsabilidade do VENDEDOR.
                                                    São obrigatórias todas as revisões de manutenção e conservação, nos prazos lá estipulados, sendo necessária a documentação desses serviços,
                                                    para comprovação, sob pena de exclusão das garantias.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DECLARAÇÃO DE CONHECIMENTO INTEGRAL DO CONTRATO</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 16ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O COMPRADOR declara, neste ato: <br>
                                                a) que recebeu previamente do VENDEDOR a minuta do presente instrumento, a fim de que a mesma fosse examinada, inclusive com a liberdade de ser assessorado por advogado de sua confiança,
                                                    pelo prazo mínimo de 48 (quarenta e oito) horas;<br>
                                                b) que compreende de forma plena as cláusulas e condições doravante descritas neste contrato,
                                                    assim como o seu alcance e objetivos, pelo que, nada poderá alegar, futuramente, o COMPRADOR sobre desconhecimento,
                                                    surpresa ou vício de vontade ou consentimento;<br>
                                                c) que as obrigações assumidas por ele, neste contrato, estão de acordo com a sua capacidade econômico-financeira;<br>
                                                d) que se obriga a guardar, tanto na execução quanto na conclusão do presente contrato, os princípios de probidade e boa-fé.</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DOS MANDATOS</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 17ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O COMPRADOR, neste ato, nomeia e constitui o VENDEDOR como sua procuradora,
                                                    em caráter irrevogável e irretratável, nos termos do art. 684 do Código Civil vigente,
                                                    podendo a mandatária substabelecer, no todo ou em parte, com ou sem reserva de iguais poderes para si, com a finalidade de: <br>
                                                a) representá-lo perante o Oficial de Registro de Imóveis competente, a fim de, nos termos da lei 4.591/1964, e legislação pertinente,
                                                    efetivar, no momento próprio, os registros dos instrumentos de instituição, divisão, especificação e de convenção de condomínio do edifício,
                                                    assim como a averbação da construção do prédio, a re-ratificação do memorial de incorporação e da convenção de condomínio,
                                                    com a finalidade de serem insertas as alterações que se fizerem necessárias, inclusive cumprindo eventuais exigências do referido Oficial de Registro de Imóveis;<br>
                                                b) abrir, em qualquer agência bancária de sua livre escolha, em nome do COMPRADOR, conta, para o fim de lá efetuar o depósito de
                                                    qualquer quantia que a ele seja devida, em decorrência deste contrato, sendo que o depósito, uma vez efetivado, valerá,
                                                    para todos os efeitos, como quitação da entrega e pagamento da quantia depositada;<br>
                                                c) representá-lo perante o órgão municipal competente, para efetuar a inscrição imobiliária, em nome do COMPRADOR,
                                                    bem como para promover eventuais alterações de projeto, na forma deste contrato;</span>
                </p>

                <p class="Cont" style="line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">DAS DISPOSIÇÕES GERAIS</span></b>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 18ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Toda e qualquer alteração deverá ser feita por escrito,
                                                    com anuência de ambas as partes, em termo aditivo, permanecendo válidas e vigentes todas as cláusulas que por ele não forem alcançadas.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 19ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">As partes reconhecem que, nos termos do art. 5º, inciso XXXVI, da Constituição Federal,
                                                    este instrumento, por elas assinado, em verdadeira manifestação de suas vontades, constitui ato jurídico perfeito, não podendo,
                                                    assim, ser objeto de modificação ou alteração por lei ou decisão superveniente, a não ser que, assim queiram todas as partes,
                                                    o que deverá ser manifestado por escrito, mediante termo aditivo.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 20ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Todas as despesas com escritura, ITBI, certidões negativas,
                                                    quitações fiscais, custas, emolumentos de cartório, despesas de registro, impostos, taxas, laudêmios, emolumentos de avaliação,
                                                    taxas do agente financeiro e quaisquer outras, serão suportadas exclusivamente pelo COMPRADOR.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 21ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Entendendo o COMPRADOR pela contratação de prestador de serviços,
                                                    correspondente ou despachante imobiliário, para reunião de documentos, formação de processos e realização de diligências para fins de
                                                    aprovação e formalização de financiamento junto ao agente bancário, serão de sua responsabilidade, inclusive o respectivo pagamento,
                                                    ficando o VENDEDOR absolutamente isenta, figurando como terceira estranha ao referido negócio.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 22ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Este contrato é celebrado em caráter irrevogável e irretratável,
                                                    não comportando o arrependimento de qualquer das partes, faculdade a qual renunciam expressamente, neste ato,
                                                    observadas as cláusulas de rescisão nele previstas, obrigando-se por si, seus herdeiros e sucessores a qualquer título.</span>
                </p>

                <p class="Cont" style="text-align: justify; line-height: normal;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Cláusula 23ª: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">O foro competente para dirimir toda e qualquer questão ou litígio decorrente deste
                                                    contrato é o da comarca da situação do imóvel prometido, renunciando as partes, a qualquer outro, por mais privilegiado que se apresente. <br>
                                                    E assim, por estarem justos e comprometidos, após lido e achado conforme, assinam as partes, o presente instrumento, em 03 (três) vias de igual teor e forma.</span>
                </p>

                <p class="Cont" style="line-height: normal; margin-top: 30px;">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">Franca: </span></b>
                    <span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">{{ date('d/m/Y') }}.</span>
                </p>

                <p class="Cont" style="line-height: normal; margin-top: 50px;" align="center">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">____________________________________<br>
                            @foreach($compradores as $comprador){{$comprador->nome_razao}}@endforeach</span></b>
                </p>
                <p class="Cont" style="line-height: normal; margin-top: 50px;" align="center">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">____________________________________<br>
                            @foreach($vendedores as $vendedor){{$vendedor->nome_razao}}@endforeach</span></b>
                </p>
                <p class="Cont" style="line-height: normal; margin-top: 50px;" align="center">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">____________________________________<br>
                            @foreach($corretores as $corretor){{$corretor->nome_razao}}@endforeach</span></b>
                </p>
                <p class="Cont" style="line-height: normal; margin-top: 50px;" align="center">
                    <b><span style="font-size: 7.5pt; font-family: quot, Verdana, sans-serif;">____________________________________<br>
                            @foreach($imobiliarias as $imobiliaria){{$imobiliaria->razao_social}}@endforeach</span></b>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>

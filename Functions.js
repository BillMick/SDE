let Security = class Security
{
    constructor(word)
    {
        this.pass = word;
        this.digit = 3;
        this.list = "azertyuiopqsdfghjklmwxcvbn0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZéèàç@&*+-/_=?.!:;,$ù";
        this.listLength = (this.list).length;
    }
    Encryption()
    {   
        for(let i = 0; i < this.listLength; i++)
        {
            for(let j = 0; j < this.listLength-this.digit; j++)
            {
                if (this.pass[i] == this.list[j])
                {
                    this.pass[i] = this.list[j+this.digit];
                    break;
                }
                else
                {
                    for (let k = this.listLength-1; k > this.listLength-this.digit; k--)
                    {
                        if (this.pass[i] == this.list[k])
                        {
                            this.pass[i] = this.list[this.digit-this.listLength+k];
                            break;
                        }
                    }
                    break;
                }
            }
        }
        alert(bill.pass);
    }
    Decryption()
    {
        for(let i = 0; i < this.listLength; i++)
        {
            for(let j = 0; j < this.listLength-this.digit; j++)
            {
                if (this.pass[i] == (this.list)[j])
                {
                    this.pass[i] = (this.list)[j-this.digit];
                    break;
                }
                else
                {
                    for (let k = this.digit-1; k > -1; k--)
                    {
                        if (this.pass[i] == (this.list)[k])
                        {
                            this.pass[i] = (this.list)[-this.digit+this.listLength-k];
                            break;
                        }
                    }
                    break;
                }
            }
        }
    }
}
//après instanciation on peut ajouter: console.log('nomInstanciation')
var variable = navigator.appCodeName;
var bill = new Security(variable);
bill.Encryption();
alert(bill.pass);alert(bill.digit);alert(bill.list);alert(bill.listLength);

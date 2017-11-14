from flask import Flask, render_template, render_template_string, request
app = Flask(__name__)

@app.route("/")
def index():
    secret = request.args.get('secret')
    print secret    

    black_list = ["__", "[", "]",
    '|a', '|b', '|c', '|d', '|e', '|f', '|g', '|h' , '|i', '|j', '|k', '|l', '|m', '|n', '|o', '|p', '|q', '|r', '|s', '|t', '|u', '|v', '|w', '|x', '|y', '|z', 
    ' ', '"', '\x0a', 'os']   

    for bad_strings in black_list:
        for param in request.args:
            if bad_strings in request.args[param]:
                if(bad_strings == '\x0a'):
                    return "Emmmmm, '{}' is not allowed.".format(str(list(bad_strings))[2:-2]), 400  
                else:
                    return "Emmmmm, '{}' is not allowed.".format(bad_strings), 400  

    rendered_template = render_template("app.html", find_secret = secret)
    # print(rendered_template)  

    return render_template_string(rendered_template)



if __name__ == "__main__":
    app.run(host="0.0.0.0")
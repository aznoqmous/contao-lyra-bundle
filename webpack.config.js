const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: {
        backend: "./src/Resources/assets/backend.js"
    },
    mode: "production",
    output: {
        filename: "[name].min.js",
        path: __dirname + "/src/Resources/public"
    },
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                use: ['babel-loader']
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    { loader: "css-loader" },
                    { loader: "sass-loader" },
                ]
            }
        ]
    },
    resolve: {
        extensions: ['*', '.js']
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].min.css",
            chunkFilename: "[id].min.css"
        })
    ]
};
